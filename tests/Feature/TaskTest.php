<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Livewire\Livewire;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_homepage_does_contains_tasks(): void
    {

        $project = Project::create([
            'project_name' => 'software development'
        ]);

        // Now create a task associated with that project
        $task = Task::create([
            'task_name' => 'Task 1',
            'project_id' => $project->id, // Use the ID of the created project
        ]);
        $response = Livewire::test('livewire-order-manager');

        //If i was not using a livewire component
        //$response = $this->get('/');

        //$response->assertStatus(200);
        $response->assertSee('Task 1');
        $response->assertViewHas('tasks', function ($collection) use ($task) {
            return $collection->contains($task);
        });
    }
}

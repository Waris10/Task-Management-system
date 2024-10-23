<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class LivewireOrderManager extends Component
{
    public $byProject;

    //Method for handling task reordering
    public function reorderTask($tasks)
    {
        foreach ($tasks as $task) {
            Task::whereId($task['value'])->update(['priority' => $task['order']]);
        }
    }

    public function render()
    {
        $projects = Project::all();
        $tasks = Task::when($this->byProject, function ($query) {
            $query->where('project_id', $this->byProject);
        })->orderBy('priority')->get();
        return view('livewire.livewire-order-manager', [
            'projects' => $projects,
            'tasks' => $tasks

        ]);
    }
}

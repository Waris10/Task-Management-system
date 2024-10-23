<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'task_name' => 'required|string|max:255',
            'project_id' => 'required|integer'
        ]);

        //Increases the priority automatically in the database instead of adding a priority input field
        $currentPriority = Task::max('priority') ?? 0;
        $newCurrentPriority = $currentPriority + 1;

        Task::create([
            'task_name' => $request->input('task_name'),
            'priority' => $newCurrentPriority,
            'project_id' => $data['project_id']
        ]);
        return redirect()->route('index.task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $taskId)
    {
        $projects = Project::all();
        $task = Task::findOrFail($taskId);
        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $taskId)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
        ]);

        $task = Task::findOrFail($taskId);

        $task->update($request->all());
        return redirect()->route('index.task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();

        //So the order won't be scattered after deletion of a particular task
        $tasks = Task::orderBy('priority')->get();

        foreach ($tasks as $index => $task) {
            $task->priority = $index + 1;
            $task->save();
        }

        return redirect()->back();
    }
}

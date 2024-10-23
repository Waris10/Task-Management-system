<x-layout>
    <h1>Edit task</h1>
    <form action="{{route('update.task', $task)}}" method="POST">
        @method('PUT')
        @csrf
        <label for="Task name">Task name</label>
        <input type="text" name="task_name" value="{{$task->task_name}}"><br><br>
        <label class="block mt-4 text-sm">Project</label>
        <select required name="project_id" id="project_id">
            <option disabled selected>-- Select project --</option>
            @foreach ($projects as $project)
            <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                {{ $project->project_name }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Update task</button>
    </form>
</x-layout>

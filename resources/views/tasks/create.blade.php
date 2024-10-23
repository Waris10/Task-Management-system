    <x-layout>
    <h1>Add a new task</h1>
    <form action="{{route('store.task')}}" method="post">
        @csrf
        <label for="Task name">Task name</label>
        <input type="text" name="task_name">
        <br>
        <br>
        <label class="block mt-4 text-sm">Project</label>
        <select required name="project_id" id="project_id">
            <option disabled selected>-- Select project --</option>
                @foreach ($projects as $project)
                        <option value="{{ $project->id }}">
                            {{ $project->project_name }}</option>
                        @endforeach
        </select>
        <br><br>
        <button type="submit">Add task</button>
    </form>
    </x-layout>


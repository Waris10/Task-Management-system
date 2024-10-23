<div class="mt-4 container px-6 mx-auto grid gap-6 mb-8 md:grid-cols-1" style="padding-top: 10%">
    <div style="display:flex">
        <div style="padding-inline-start: 0.75rem">
            <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                Task Management System
            </h4>
        </div>
        {{-- Create task route --}}
        <div style="margin-inline-start: auto">
            <a class=" items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple bg-blue-600"
                href="{{route('create.task')}}">
                Create Task
                <span class="ml-2" aria-hidden="true">+</span>
            </a>
        </div>
        {{-- Create task route --}}
    </div>
    <form action="{{route('index.task')}}" method="GET">
        @csrf
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Filter Tasks by Project
            </span>
            <select
                class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-500 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                wire:model.live="byProject">
                <option value="">No selected</option>
                @foreach ($projects as $project)
                <option value="{{$project->id}}">
                    {{$project->project_name}}
                </option>
                @endforeach
            </select>
        </label>
    </form> {{-- Task Table --}}
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                        <th class="px-4 py-3"></th>
                        <th class="px-4 py-3">Priority</th>
                        <th class="px-4 py-3">Task Name</th>
                        <th class="px-4 py-3">Timestamp(Created, Updated)</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="sortable"
                    wire:sortable="reorderTask">
                    {{-- Render each task from the database using foreach --}}
                    @foreach ($tasks as $task)
                    <tr class="text-gray-700 dark:text-gray-400" wire:sortable.item="{{ $task->id }}"
                        wire:key="task-{{ $task->id }}">
                        <td class="px-4 py-4" wire:sortable.handle><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M3 9a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9Zm0 6.75a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                                    clip-rule="evenodd" />
                            </svg></td>
                        <td class="px-4 py-3">#{{$task->priority}}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{$task->task_name}}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $task->project->project_name}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">{{$task->created_at}}, {{$task->updated_at}}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-left space-x-4 text-sm">
                                <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit" href="{{route('edit.task', $task)}}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="{{route('destroy.task', $task)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" href="{{route('destroy.task', $task)}}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{-- endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- Task Table end --}}
</div>
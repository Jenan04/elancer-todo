<x-layouts.app>
    <x-slot:title>Focus - Task List</x-slot:title>

    <div class="px-gutter-desktop py-stack-lg max-w-container-max mx-auto animate-fade-in">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Task List</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    You have {{ $remainingTasksCount }} tasks remaining for today.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <button class="px-4 py-2 bg-surface-container-high text-on-surface rounded-lg font-label-md text-label-md border border-outline-variant hover:bg-surface-container-highest transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span>
                    Filters
                </button>
                <a class="w-full px-4 py-2 bg-primary text-on-primary font-bold rounded-lg flex items-center justify-center gap-2 cursor-pointer active:scale-95 transition-transform" href="{{ route('tasks.create') }}">
                  <span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                  <span class="font-label-md text-label-md">Create Task</span>
                </a>
            </div>
        </div>

        <div class="flex flex-wrap gap-stack-md mb-8">
            <div class="flex items-center gap-2 pr-4 border-r border-outline-variant">
                <span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Priority</span>
                <button class="px-3 py-1 bg-error-container text-on-error-container rounded-full text-label-sm font-label-sm hover:brightness-95 transition-all">High</button>
                <button class="px-3 py-1 bg-surface-variant text-on-secondary-fixed-variant rounded-full text-label-sm font-label-sm hover:brightness-95 transition-all">Medium</button>
                <button class="px-3 py-1 bg-secondary-container text-on-secondary-fixed-variant rounded-full text-label-sm font-label-sm hover:brightness-95 transition-all">Low</button>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-gutter-desktop">
            
            <div class="col-span-12 lg:col-span-8 space-y-4">
                @forelse($tasks as $task)
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex items-center gap-4 hover:shadow-sm transition-all group {{ $task->status === 'completed' ? 'opacity-60' : '' }}">
                        
                        <input 
                            class="task-checkbox w-5 h-5 rounded-full border-2 border-outline-variant text-secondary focus:ring-secondary cursor-pointer" 
                            id="task-{{ $task->id }}" 
                            type="checkbox"
                            {{ $task->status === 'completed' ? 'checked' : '' }}
                        >
                        
                        <div class="flex-grow">
                            <label class="font-body-lg text-body-lg text-on-surface block cursor-pointer transition-colors {{ $task->status === 'completed' ? 'line-through text-outline' : '' }}" for="task-{{ $task->id }}">
                                {{ $task->title }}
                            </label>
                            <div class="flex items-center gap-4 mt-1">
                                <span class="flex items-center gap-1 text-label-sm font-label-sm text-on-surface-variant">
                                    <span class="material-symbols-outlined text-[14px]">
                                        {{ $task->status === 'completed' ? 'check_circle' : 'calendar_today' }}
                                    </span>
                                    {{ $task->status === 'completed' ? 'Completed' : ($task->due_at ? $task->due_at->diffForHumans() : 'No deadline') }}
                                </span>
                                @if($task->client_or_project)
                                    <span class="px-2 py-0.5 bg-surface-container-high text-primary rounded text-[10px] font-bold uppercase tracking-tighter">
                                        {{ $task->client_or_project }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <span class="px-2 py-1 rounded-lg text-label-sm font-label-sm 
                            {{ $task->priority === 'high' ? 'bg-error-container text-on-error-container' : ($task->priority === 'medium' ? 'bg-surface-variant text-on-secondary-fixed-variant' : 'bg-secondary-container text-on-secondary-fixed-variant') }}">
                            {{ ucfirst($task->priority ?? 'low') }}
                        </span>

                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('tasks.edit', $task) }}" class="material-symbols-outlined text-on-surface-variant hover:text-primary p-1 rounded-full hover:bg-surface-container">edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="material-symbols-outlined text-error hover:bg-error-container/20 p-1 rounded-full transition-colors">delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-surface-container-lowest border border-outline-variant rounded-xl">
                        <span class="material-symbols-outlined text-4xl text-on-surface-variant mb-2">format_list_bulleted</span>
                        <p class="text-body-lg text-on-surface-variant">No tasks found. Click "Create Task" above to start!</p>
                    </div>
                @endforelse
            </div>

            <div class="col-span-12 lg:col-span-4 space-y-gutter-desktop">
                <div class="bg-primary text-on-primary rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="font-headline-md text-headline-md mb-2">Weekly Goal</h3>
                        <p class="font-body-md text-body-md opacity-90 mb-6">Keep tracking your production and complete tasks daily.</p>
                        <div class="w-full bg-white/20 h-2 rounded-full mb-2">
                            <div class="bg-secondary-fixed h-full rounded-full" style="width: 65%"></div>
                        </div>
                        <span class="text-label-sm font-label-sm">In Progress</span>
                    </div>
                </div>

                <div class="bg-surface-container-low rounded-2xl p-6 border border-outline-variant">
                    <h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest mb-4">Focus by Category</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full bg-primary"></span>
                                <span class="font-body-md text-body-md">Projects / Work</span>
                            </div>
                            <span class="font-label-md text-label-md">{{ $categoryCounts['work'] }} Tasks</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full bg-secondary"></span>
                                <span class="font-body-md text-body-md">Personal</span>
                            </div>
                            <span class="font-label-md text-label-md">{{ $categoryCounts['personal'] }} Tasks</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
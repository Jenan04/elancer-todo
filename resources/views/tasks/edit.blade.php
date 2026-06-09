<x-layouts.app>
    <x-slot:title>Edit Task - {{ $task->title }}</x-slot:title>

    <div class="max-w-2xl mx-auto p-gutter-desktop animate-fade-in">
        <div class="flex items-center gap-4 mb-stack-lg">
            <a href="{{ route('tasks.index') }}" class="material-symbols-outlined text-on-surface-variant hover:text-primary p-2 rounded-full hover:bg-surface-container transition-colors">
                arrow_back
            </a>
            <div>
                <h1 class="text-headline-lg font-headline-lg text-on-surface">Edit Task</h1>
                <p class="text-body-md text-on-surface-variant">Update your task details and maintain your focus.</p>
            </div>
        </div>

        <div class="bg-surface-bright border border-outline-variant rounded-xl p-stack-lg card-elevation">
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-stack-lg">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-base">
                    <label for="title" class="text-label-md font-label-md text-on-surface-variant">Task Title</label>
                    <input type="text" id="title" name="title" 
                        value="{{ old('title', $task->title) }}"
                        class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all @error('title') border-error @enderror"
                        placeholder="What needs to be done?">
                    @error('title')
                        <span class="text-label-sm text-error font-label-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-base">
                    <label for="description" class="text-label-md font-label-md text-on-surface-variant">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all resize-none"
                        placeholder="Add some details about this task...">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-lg">
                    <div class="flex flex-col gap-base">
                        <label for="due-date" class="text-label-md font-label-md text-on-surface-variant">Due Date</label>
                        {{-- <input type="date" id="due-date" name="due-date" 
                            value="{{ old('due-date', $task->due_date?->format('Y-m-d') ?? $task->due_date) }}"
                            class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"> --}}

                          <input type="date" id="due-date" name="due-date" 
    value="{{ old('due-date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
    class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all">  
                    </div>

                    <div class="flex flex-col gap-base">
                        <label for="due-time" class="text-label-md font-label-md text-on-surface-variant">Due Time</label>
                        <input type="time" id="due-time" name="due-time" 
                            value="{{ old('due-time', $task->due_time ? \Carbon\Carbon::parse($task->due_time)->format('H:i') : '') }}"
                            class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-lg">
                    <div class="flex flex-col gap-base">
                        <label for="priority" class="text-label-md font-label-md text-on-surface-variant">Priority</label>
                        <select id="priority" name="priority" 
                            class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all">
                            <option value="low" {{ old('priority', $task->priority->value ?? $task->priority) === 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $task->priority->value ?? $task->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $task->priority->value ?? $task->priority) === 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-base">
                        <label for="status" class="text-label-md font-label-md text-on-surface-variant">Status</label>
                        <select id="status" name="status" 
                            class="w-full bg-surface border border-outline-variant rounded-lg p-stack-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all">
                            <option value="{{ \App\Enums\TaskStatus::ACTIVE->value }}" {{ old('status', $task->status->value ?? $task->status) === \App\Enums\TaskStatus::ACTIVE->value ? 'selected' : '' }}>Active</option>
                            <option value="{{ \App\Enums\TaskStatus::COMPLETED->value }}" {{ old('status', $task->status->value ?? $task->status) === \App\Enums\TaskStatus::COMPLETED->value ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-stack-md pt-stack-md border-t border-outline-variant">
                    <a href="{{ route('tasks.index') }}" 
                        class="px-stack-lg py-stack-md text-label-md font-label-md text-on-surface-variant hover:bg-surface-container rounded-lg transition-colors">
                        Cancel
                    </a>
                    {{-- py-stack-md --}}
                    <button type="submit" 
                        {{-- class="p-4 rounded-lg bg-primary text-on-primary hover:bg-primary-container text-label-md font-label-md rounded-lg card-elevation transition-colors" --}}
                       class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-md text-label-md hover:bg-primary-container transition-colors active:scale-95" action="{{ route('tasks.update', $task) }}"> 
                       Save 
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
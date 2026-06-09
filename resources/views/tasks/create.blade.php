<x-layouts.app>
    <x-slot:hideHeader>true</x-slot:hideHeader>

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-gutter-desktop">
        <div class="w-full max-w-[700px]">

            <div class="mb-stack-lg text-center">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Create New Task</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-2">Break your goals down into manageable
                    steps.</p>
            </div>

            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-stack-lg form-card">
                <form class="space-y-stack-lg" action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div>
                        <label
                            class="font-label-md text-label-md text-on-surface-variant block mb-stack-sm uppercase tracking-wider"
                            for="task-title">Task Title</label>
                        <input name="title"
                            class="w-full bg-transparent border-b-2 border-outline-variant focus:border-primary-container py-3 font-headline-md text-headline-md outline-none transition-all placeholder:text-outline"
                            id="task-title" placeholder="What needs to be done?" type="text" required />
                    </div>

                    <div>
                        <label class="font-label-md text-label-md text-on-surface-variant block mb-stack-sm"
                            for="description">Description</label>
                        <textarea name="description"
                            class="w-full rounded-lg border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container p-3 font-body-md text-body-md bg-white transition-all outline-none resize-none"
                            id="description" placeholder="Add some details or notes..." rows="3"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-lg">
                        <div class="relative">
                            <label class="font-label-md text-label-md text-on-surface-variant block mb-stack-sm"
                                for="due-date">Due Date</label>
                            <div class="relative group">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary-container">event</span>
                                <input name="due-date"
                                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container font-body-md text-body-md bg-white outline-none transition-all"
                                    id="due-date" type="date" />
                            </div>
                        </div>
                        <div class="relative">
                            <label class="font-label-md text-label-md text-on-surface-variant block mb-stack-sm"
                                for="due-time">Time</label>
                            <div class="relative group">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary-container">schedule</span>
                                <input name="due-time"
                                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container font-body-md text-body-md bg-white outline-none transition-all"
                                    id="due-time" type="time" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div>
                            <label
                                class="font-label-md text-label-md text-on-surface-variant block mb-stack-sm">Priority</label>
                            <input type="hidden" name="priority" id="priority-input" value="low">
                            <div class="flex p-1 bg-surface-container rounded-lg gap-1 max-w-md">
                                <button
                                    class="flex-1 py-2 rounded-md text-label-md font-label-md transition-all bg-white text-secondary shadow-sm font-bold"
                                    id="btn-low" onclick="selectPriority('low')" type="button">Low</button>
                                <button
                                    class="flex-1 py-2 rounded-md text-label-md font-label-md transition-all text-on-surface-variant hover:bg-surface-container-high"
                                    id="btn-medium" onclick="selectPriority('medium')" type="button">Medium</button>
                                <button
                                    class="flex-1 py-2 rounded-md text-label-md font-label-md transition-all text-on-surface-variant hover:bg-surface-container-high"
                                    id="btn-high" onclick="selectPriority('high')" type="button">High</button>
                            </div>
                        </div>
                    </div>

                    <div class="pt-stack-md flex flex-col sm:flex-row items-center justify-end gap-stack-md">
                        <a href="{{ route('tasks.index') }}"
                            class="w-full sm:w-auto text-center px-6 py-2.5 font-label-md text-label-md text-primary-container hover:bg-surface-container transition-colors rounded-lg">
                            Cancel
                        </a>
                        <button
                            class="w-full sm:w-auto px-8 py-3 bg-primary-container text-on-primary-container hover:bg-primary transition-all rounded-lg font-headline-md text-headline-md active:scale-95 flex items-center justify-center gap-2"
                            type="submit">
                            <span class="material-symbols-outlined" data-icon="add_task">add_task</span>
                            Create Task
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-stack-lg flex items-center justify-center gap-2 text-on-surface-variant">
                <span class="material-symbols-outlined text-[20px]" data-icon="lightbulb">lightbulb</span>
                <span class="text-label-sm font-label-sm italic">Pro-tip: Tasks with due times send notifications 15
                    minutes before.</span>
            </div>
        </div>
    </div>
</x-layouts.app>

<script>
    function selectPriority(priority) {
        document.getElementById('priority-input').value = priority;

        const btnLow = document.getElementById('btn-low');
        const btnMedium = document.getElementById('btn-medium');
        const btnHigh = document.getElementById('btn-high');

        [btnLow, btnMedium, btnHigh].forEach(btn => {
            btn.className = "flex-1 py-2 rounded-md text-label-md font-label-md transition-all text-on-surface-variant hover:bg-surface-container-high";
        });

        if (priority === 'low') {
            btnLow.classList.add('bg-white', 'text-secondary', 'shadow-sm', 'font-bold');
            btnLow.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
        } else if (priority === 'medium') {
            btnMedium.classList.add('bg-white', 'text-tertiary', 'shadow-sm', 'font-bold');
            btnMedium.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
        } else if (priority === 'high') {
            btnHigh.classList.add('bg-white', 'text-error', 'shadow-sm', 'font-bold');
            btnHigh.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
        }
    }
</script>
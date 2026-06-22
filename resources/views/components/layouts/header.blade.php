<header class="w-full h-16 bg-surface border-b border-outline-variant flex justify-between items-center px-gutter-desktop sticky top-0 z-40">
    <div class="flex items-center gap-stack-lg">
        <div class="relative w-64 group">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant" data-icon="search">search</span>
            <input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-body-md focus:outline-none focus:border-primary transition-all" placeholder="Search tasks, tags, or projects..." type="text">
        </div>
    </div>
    
    <div class="flex items-center gap-6">
        <div class="flex items-center gap-4">
            <button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-low p-2 rounded-full transition-colors" data-icon="notifications">notifications</button>

            <div class="relative flex items-center group cursor-pointer select-none">
                <div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center text-body-md font-bold uppercase tracking-wider shadow-sm border border-primary/10">
                    {{ mb_substr(auth()->user()->name, 0, 1, 'UTF-8') }}
                </div>

                <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 whitespace-nowrap bg-neutral-800 text-neutral-100 text-xs font-medium px-2.5 py-1.5 rounded shadow-lg pointer-events-none opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 transition-all duration-200 z-50">
                    {{ auth()->user()->name }}
                </div>
            </div>

            @if(isset($actions) && $actions->isNotEmpty())
                <div class="flex items-center ml-2">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
</header>
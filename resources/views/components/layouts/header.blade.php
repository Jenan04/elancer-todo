<header class="w-full h-16 bg-surface border-b border-outline-variant flex justify-between items-center px-gutter-desktop max-w-container-max mx-auto sticky top-0 z-40">
    <div class="flex items-center gap-stack-lg">
        <div class="relative w-64 group">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant" data-icon="search">search</span>
            <input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-body-md focus:outline-none focus:border-primary transition-all" placeholder="Search tasks, tags, or projects..." type="text">
        </div>
    </div>
    
    <div class="flex items-center gap-6">
        <div class="flex items-center gap-4">
            <button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-low p-2 rounded-full transition-colors" data-icon="notifications">notifications</button>

            <button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-low p-2 rounded-full transition-colors" data-icon="account_circle">account_circle</button>
             @if(isset($actions))
                {{ $actions }}
            @endif
        </div>
    </div>
</header>
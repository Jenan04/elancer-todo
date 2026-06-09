<aside id="sidebar"
    class=" h-screen fixed left-0 top-0 bg-surface-container-low shadow-sm flex flex-col transition-all duration-200 ease-in-out z-50
    w-64 px-stack-lg [.sidebar-collapsed_&]:w-20 [.sidebar-collapsed_&]:px-3">

    <div id="logo-header" class="mt-4 flex items-center justify-between px-2 relative mb-4 h-12 group">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 transition-transform relative w-full h-full">
            <svg id="logo-svg" class="w-8 h-8 cursor-pointer transition-all duration-200 transform origin-center [.sidebar-collapsed_&]:group-hover:scale-0 [.sidebar-collapsed_&]:group-hover:opacity-0" viewBox="0 0 20 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z" fill="#2815b6" />
            </svg>
            <span class="text-headline-md font-headline-md font-black text-primary cursor-pointer sidebar-text [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Focus</span>
        </a>

        <button id="sidebar-toggle" class="material-symbols-outlined transition-all duration-200 cursor-pointer active:scale-95">
            menu_open
        </button>
    </div>

    <nav class="flex-1 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 transition-all duration-200 rounded-lg {{ request()->routeIs('dashboard') ? 'text-primary font-bold bg-surface-container-highest' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' }}" title="Dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Dashboard</span>
        </a>
        
        <a href="{{ route('tasks.index') }}" class="flex items-center gap-3 px-4 py-3 transition-all duration-200 rounded-lg {{ request()->routeIs('tasks.*') ? 'text-primary font-bold bg-surface-container-highest' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' }}" title="Task List">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Task List</span>
        </a>

        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all duration-200 rounded-lg" href="#" title="Calendar">
            <span class="material-symbols-outlined">calendar_month</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Calendar</span>
        </a>
         <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all duration-200 rounded-lg"
            href="#" title="Profile">
            <span class="material-symbols-outlined" data-icon="person">person</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Profile</span>
        </a>
    </nav>

    <div 
    {{-- class="mt-auto space-y-2 border-t border-outline-variant pt-stack-lg" --}}
    class="mt-auto space-y-2 border-t border-outline-variant pt-stack-lg mb-12"
    >
        <a id="create-task-btn" class="w-full bg-primary text-on-primary font-bold py-3 flex items-center justify-center transition-all cursor-pointer active:scale-95
            rounded-lg gap-2 [.sidebar-collapsed_&]:rounded-full [.sidebar-collapsed_&]:w-12 [.sidebar-collapsed_&]:h-12 [.sidebar-collapsed_&]:mx-auto [.sidebar-collapsed_&]:p-0" 
            href="{{ route('tasks.create') }}" title="Create Task">
            <span class="material-symbols-outlined text-[20px]">add</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 whitespace-nowrap [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Create Task</span>
        </a>

         <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all duration-200 rounded-lg"
            href="#" title="Settings">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Settings</span>
        </a>

        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all duration-200 rounded-lg"
            href="#" title="Help">
            <span class="material-symbols-outlined" data-icon="help">help</span>
            <span class="font-label-md text-label-md sidebar-text transition-opacity duration-200 [.sidebar-collapsed_&]:hidden [.sidebar-collapsed_&]:opacity-0">Help</span>
        </a>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('sidebar-toggle');
        const createTaskBtn = document.getElementById('create-task-btn');

        const updateToggleBtnStyle = (collapse) => {
            if (collapse) {
                toggleBtn.innerText = 'menu';
                toggleBtn.className = "material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full text-primary opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 group-hover:bg-blue-100 transition-all duration-200 cursor-pointer active:scale-95";
            } else {
                toggleBtn.innerText = 'menu_open';
                toggleBtn.className = "material-symbols-outlined text-on-surface-variant hover:text-primary p-1.5 rounded-full hover:bg-surface-container-highest cursor-pointer transition-all active:scale-95 static opacity-100 scale-100";
            }
        };

        const isCollapsed = document.documentElement.classList.contains('sidebar-collapsed');
        updateToggleBtnStyle(isCollapsed);

        toggleBtn.addEventListener('click', () => {
            const currentCollapse = document.documentElement.classList.contains('sidebar-collapsed');
            
            if (currentCollapse) {
                document.documentElement.classList.remove('sidebar-collapsed');
                localStorage.setItem('sidebar-collapsed', 'false');
                updateToggleBtnStyle(false);
            } else {
                document.documentElement.classList.add('sidebar-collapsed');
                localStorage.setItem('sidebar-collapsed', 'true');
                updateToggleBtnStyle(true);
            }
        });
    });
</script>
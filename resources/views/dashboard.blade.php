<x-layouts.app>
    <x-slot:title>Focus - Dashboard</x-slot:title>
    <div class="p-gutter-desktop max-w-container-max mx-auto">
        <x-slot:headerActions>
        <a class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-md text-label-md hover:bg-primary-container transition-colors active:scale-95" href="{{ route('tasks.create') }}">
            Create Task
        </a>
    </x-slot:headerActions>
        <x-dashboard.welcome />

        <x-dashboard.content />
        
    </div>
</x-layouts.app>
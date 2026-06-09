@props(['deadlines' => [], 'activities' => []])

<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter-desktop">
    
    <section class="md:col-span-8 bg-white p-stack-lg rounded-xl card-elevation border border-outline-variant">
        <div class="flex justify-between items-center mb-stack-lg">
            <h3 class="font-headline-md text-headline-md flex items-center gap-2">
                <span class="material-symbols-outlined text-error" data-icon="event_busy">event_busy</span>
                Upcoming Deadlines
            </h3>
            <a href="{{ route('tasks.index') }}" class="text-primary font-label-md text-label-md hover:underline">View All</a>
        </div>
        
        <div class="space-y-3">
            @forelse($deadlines as $task)
                <div class="flex items-center p-4 rounded-lg border border-slate-200 hover:elevation-2 transition-all group cursor-pointer">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center mr-4 
                        {{ $task->priority === 'high' ? 'bg-error-container text-error' : ($task->priority === 'medium' ? 'bg-surface-container text-primary' : 'bg-secondary-container text-secondary') }}">
                        <span class="material-symbols-outlined">
                            {{ $task->priority === 'high' ? 'priority_high' : ($task->priority === 'medium' ? 'description' : 'chat') }}
                        </span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-body-lg text-body-lg font-bold">{{ $task->title }}</h4>
                        <p class="text-label-sm text-on-surface-variant">{{ $task->client_or_project ?? 'Internal Team' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-label-md font-bold {{ $task->due_at->isToday() ? 'text-error' : 'text-on-surface' }}">
                            {{ $task->due_at->isToday() ? 'Today' : ($task->due_at->isTomorrow() ? 'Tomorrow' : $task->due_at->format('M d')) }}, 
                            {{ $task->due_at->format('g:i A') }}
                        </p>
                        <span class="text-label-sm px-2 py-0.5 rounded-full 
                            {{ $task->priority === 'high' ? 'bg-error-container text-on-error-container' : ($task->priority === 'medium' ? 'bg-surface-container-highest text-on-surface-variant' : 'bg-secondary-container text-on-secondary-fixed-variant') }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </div>
                </div>
            @empty
                <p class="text-body-md text-on-surface-variant text-center py-4">No upcoming deadlines found.</p>
            @endforelse
        </div>
    </section>

    <section class="md:col-span-4 space-y-gutter-desktop">
        <div class="bg-primary-container text-on-primary-container p-stack-lg rounded-xl card-elevation relative overflow-hidden group">
            <div class="relative z-10">
                <p class="font-label-md text-label-md opacity-80 mb-2">Active Projects</p>
                <h3 class="font-headline-lg text-headline-lg font-bold">12</h3>
                <div class="mt-4 flex -space-x-2">
                    <img class="h-8 w-8 rounded-full border-2 border-primary-container" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC4JLukV0gcovFUfh5bJ5neOeW2kqLeIk7wkSBaXmkD6HjhdzoOM-TGrridk8DYf7q4gHSNS_5oM-LMPx1UAbORbYTx8vjH8lPSSbZEETbpsdOaUcY7zeQw3GBCeAwDI_cglPrtWs0u2uULzAarvDe7MZ53YDAX7eF2B82M5OiGKjrURc7mC76yFYDFJSy-NEMEAryflAlFUIGswF8yl5vlABLxJAx-r37HCdBwf7KeE0ZnusA03rIQS3IW-R_kbkKYRZSLAoSBFx76" alt="User 1">
                    <img class="h-8 w-8 rounded-full border-2 border-primary-container" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrgHZicbcGXmdT3tPuAPpo-aK9BbZrOUWAXgsuxmgTC89BuIr1jHELG_g8UtcMj2XXMSRsg-1t_kRWx04hTbVWLDQh_OMEc4Vp4iJ6UsEoHLmxIKOpL-7DoZqutXYWZ3LqP1xIvmq27qxW_dnfbi_atU0mhxWK06DXtTtfsHWaX5AqEB-FRjLfe3V9_CCqEzo74wNKEU2T33FHEIwyC8L3yeRYy5kLK1u47Q7g1OmMDhk-lVJZv8Lck12xqWpyQb8GaeijXMUSWZ7v" alt="User 2">
                    <div class="h-8 w-8 rounded-full border-2 border-primary-container bg-primary flex items-center justify-center text-label-sm">+4</div>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[120px] opacity-10 group-hover:scale-110 transition-transform" data-icon="folder_managed">folder_managed</span>
        </div>

         <div class="">
           {{-- <h3 class="font-headline-md text-headline-md mb-stack-lg">Project Overview</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-label-md text-label-md font-bold">Design System</span>
                        <span class="text-label-sm text-on-surface-variant">80%</span>
                    </div>
                    <div class="h-1 bg-surface-container-high rounded-full overflow-hidden">
                        <div class="h-full bg-secondary w-[80%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-label-md text-label-md font-bold">Mobile App Dev</span>
                        <span class="text-label-sm text-on-surface-variant">45%</span>
                    </div>
                    <div class="h-1 bg-surface-container-high rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[45%]"></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <section class="md:col-span-12 bg-white p-stack-lg rounded-xl card-elevation border border-outline-variant">
        <div class="flex items-center justify-between mb-stack-lg">
            <h3 class="font-headline-md text-headline-md">Recent Activity</h3>
            <span class="text-label-sm bg-surface-container px-3 py-1 rounded-full text-on-surface">Last 24 hours</span>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($activities as $activity)
                <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-colors">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 
                        {{ $activity->status === 'completed' ? 'bg-secondary-container text-secondary' : 'bg-primary-container text-on-primary' }}">
                        <span class="material-symbols-outlined text-[18px]">
                            {{ $activity->status === 'completed' ? 'check_circle' : 'add_comment' }}
                        </span>
                    </div>
                    <div>
                        <p class="text-body-md font-bold">{{ $activity->status === 'completed' ? 'Task Completed' : 'Task Updated' }}</p>
                        <p class="text-label-sm text-on-surface-variant">{{ $activity->title }}</p>
                    </div>
                </div>
            @empty
                <p class="text-body-md text-on-surface-variant col-span-4 text-center py-2">No recent activity.</p>
            @endforelse
        </div>
    </section>
</div>
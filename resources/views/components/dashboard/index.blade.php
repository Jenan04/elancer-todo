<x-layouts.app>
    <div class="p-gutter-desktop max-w-container-max mx-auto">
        
        <x-dashboard.welcome 
            :percentage="$progressPercentage" 
            :completed="$todayCompletedCount" 
            :total="$todayTasksCount" 
        />

        <x-dashboard.content 
            :deadlines="$upcomingDeadlines" 
            :activities="$recentActivities" 
        />
        
    </div>
</x-layouts.app>
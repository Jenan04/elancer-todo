@props([
    'percentage' => 0, 
    'completed' => 0, 
    'total' => 0
])

<section class="mb-stack-lg animate-fade-in">
    <div class="flex flex-col md:flex-row justify-between items-end gap-stack-md">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Good morning, Alex</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-1">Here's what's happening with your workspace today.</p>
        </div>
        
        <div class="bg-surface-container rounded-xl p-stack-md flex items-center gap-4 card-elevation">
            <div class="relative h-12 w-12 flex items-center justify-center">
                <svg class="absolute inset-0 w-full h-full transform -rotate-90">
                    <circle class="text-outline-variant" cx="24" cy="24" fill="transparent" r="20" stroke="currentColor" stroke-width="4"></circle>
                    <circle class="text-secondary" cx="24" cy="24" fill="transparent" r="20" stroke="currentColor" 
                            stroke-dasharray="125.6" 
                            stroke-dashoffset="{{ 125.6 - (125.6 * $percentage / 100) }}" 
                            stroke-width="4"></circle>
                </svg>
                <span class="font-label-md text-label-md text-on-surface">{{ $percentage }}%</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-secondary-container font-bold">Today's Progress</p>
                <p class="font-body-md text-body-md text-on-surface">{{ $completed }} of {{ $total }} tasks completed</p>
            </div>
        </div>
    </div>
</section>
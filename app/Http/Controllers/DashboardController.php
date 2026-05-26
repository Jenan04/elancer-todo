<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $todayTasksCount = Task::whereDate('created_at', Carbon::today())->count();
        $todayCompletedCount = Task::whereDate('created_at', Carbon::today())
            ->where('status', 'completed')
            ->count();
            
        $progressPercentage = $todayTasksCount > 0 
            ? round(($todayCompletedCount / $todayTasksCount) * 100) 
            : 0;

        $upcomingDeadlines = Task::where('status', 'active')
            ->whereNotNull('due_at')
            ->orderBy('due_at', 'asc')
            ->take(3) 
            ->get();

        $recentActivities = Task::latest('updated_at')
            ->where('updated_at', '>=', now()->subHours(24))
            ->take(4)
            ->get();

        return view('dashboard', compact(
            'todayTasksCount',
            'todayCompletedCount',
            'progressPercentage',
            'upcomingDeadlines',
            'recentActivities'
        ));
    }
}

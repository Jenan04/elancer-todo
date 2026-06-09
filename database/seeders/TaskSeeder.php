<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use App\Enums\TaskStatus;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jenan Y.',
            'email' => 'jenan@example.com',
            'password' => Hash::make('password123'), // كلمة المرور للتجربة
        ]);

        // 2. إنشاء مهام تجريبية مرتبطة بهذا المستخدم مباشرة (عبر الريليشن)
        $tasks = [
            [
                'title' => 'Design Todo App UI',
                'description' => 'Review and refine the minimalist glassmorphism layout based on Figma guidelines.',
                'priority' => 'high',
                'status' => TaskStatus::ACTIVE->value,
                'due_date' => now()->addDays(2)->format('Y-m-d'),
                'due_time' => '14:00',
            ],
            [
                'title' => 'Setup Laravel v13 Architecture',
                'description' => 'Configure Models, migrations, and TaskStatus backed enums.',
                'priority' => 'high',
                'status' => TaskStatus::COMPLETED->value,
                'due_date' => now()->subDays(1)->format('Y-m-d'),
                'due_time' => '10:00',
                'completed_at' => now()->subDays(1),
            ],
            [
                'title' => 'Fix Vite Tailwind v4 compilation',
                'description' => 'Migrate theme configuration from CDN script tags into resources/css/app.css using @theme.',
                'priority' => 'medium',
                'status' => TaskStatus::ACTIVE->value,
                'due_date' => now()->addDays(4)->format('Y-m-d'),
                'due_time' => '16:30',
            ],
            [
                'title' => 'Write clean repository documentation',
                'description' => 'Update README.md with comprehensive tech stack specs and structural layout design links.',
                'priority' => 'low',
                'status' => TaskStatus::ACTIVE->value,
                'due_date' => now()->addDays(5)->format('Y-m-d'),
                'due_time' => '09:00',
            ],
        ];

        foreach ($tasks as $taskData) {
            // استخدام ريليشن المستخدم لحفظ المهمة ليكون الـ user_id تلقائي وصحيح
            $user->tasks()->create($taskData);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();

        if (!$user || $categories->isEmpty()) return;

        $tasks = [
            ['title' => 'Complete project report', 'description' => 'Finish the quarterly report', 'status' => 'pending', 'priority' => 'high', 'due_date' => now()->addDays(3)],
            ['title' => 'Team meeting', 'description' => 'Weekly sync with team', 'status' => 'pending', 'priority' => 'medium', 'due_date' => now()->addDays(1)],
            ['title' => 'Code review', 'description' => 'Review pull requests', 'status' => 'pending', 'priority' => 'medium', 'due_date' => now()->addDays(2)],
            ['title' => 'Buy groceries', 'description' => 'Weekly shopping', 'status' => 'pending', 'priority' => 'low', 'due_date' => now()->addDays(1)],
            ['title' => 'Gym workout', 'description' => 'Evening workout session', 'status' => 'completed', 'priority' => 'low', 'due_date' => now()->subDays(1)],
        ];

        foreach ($tasks as $task) {
            Task::create(array_merge($task, [
                'user_id' => $user->id,
                'category_id' => $categories->random()->id
            ]));
        }
    }
}

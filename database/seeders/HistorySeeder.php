<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\History;
use App\Models\Task;
use App\Models\User;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $task1 = Task::where('name', 'Task 1 für Projekt 1')->first();

        History::create([
            'task_id' => $task1->id,
            'user_id' => User::where('email', 'employee@example.com')->first()->id,
            'action' => 'Task erstellt',
            'description' => 'Die Aufgabe wurde erstellt.',
        ]);

        History::create([
            'task_id' => $task1->id,
            'user_id' => User::where('email', 'leader@example.com')->first()->id,
            'action' => 'Status geändert',
            'description' => 'Der Status der Aufgabe wurde auf "in progress" gesetzt.',
        ]);
    }
}

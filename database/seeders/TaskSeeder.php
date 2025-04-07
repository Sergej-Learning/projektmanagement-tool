<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::where('name', 'Projekt 1')->first();
        $project2 = Project::where('name', 'Projekt 2')->first();

        Task::create([
            'name' => 'Task 1 für Projekt 1',
            'description' => 'Beschreibung der Aufgabe 1',
            'status' => 'in_progress',
            'project_id' => $project1->id,
            'assigned_to' => User::where('email', 'employee@example.com')->first()->id
        ]);

        Task::create([
            'name' => 'Task 2 für Projekt 2',
            'description' => 'Beschreibung der Aufgabe 2',
            'status' => 'completed',
            'project_id' => $project2->id,
            'assigned_to' => User::where('email', 'leader@example.com')->first()->id
        ]);
    }
}

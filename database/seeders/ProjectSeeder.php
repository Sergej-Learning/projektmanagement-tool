<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'leader@example.com')->first();

        Project::create([
            'name' => 'Projekt 1',
            'description' => 'Beschreibung für Projekt 1',
            'status' => 'in_progress',
            'owner_id' => $user->id
        ]);

        Project::create([
            'name' => 'Projekt 2',
            'description' => 'Beschreibung für Projekt 2',
            'status' => 'completed',
            'owner_id' => $user->id
        ]);
    }
}

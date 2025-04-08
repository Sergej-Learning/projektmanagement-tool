<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\History;
use App\Models\Report;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AdminUserSeeder::class);

        User::factory(5)->create();

        Project::factory(5)->create()->each(function ($project) {

            Task::factory(rand(3, 7))->create([
                'project_id' => $project->id,
            ]);

            History::factory(rand(2, 5))->create([
                'project_id' => $project->id,
                'user_id' => rand(1, 6),
            ]);

            Report::factory()->create([
                'project_id' => $project->id,
            ]);
        });
    }
}

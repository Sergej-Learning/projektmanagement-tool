<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;
use App\Models\Task;
use App\Models\History;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();


        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $projectManagerRole = Role::firstOrCreate(['name' => 'project_manager']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);


        $adminUser = User::create([
            'name' => $faker->name,
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $adminUser->roles()->attach($adminRole);



        $projectManagerUser = User::create([
            'name' => $faker->name,
            'email' => 'project_manager@example.com',
            'password' => bcrypt('password'),
        ]);
        $projectManagerUser->roles()->attach($projectManagerRole);


        $employeeUser = User::create([
            'name' => $faker->name,
            'email' => 'employee@example.com',
            'password' => bcrypt('password'),
        ]);
        $employeeUser->roles()->attach($employeeRole);


        $project1 = Project::create([
            'name' => $faker->sentence(3),
            'user_id' => $projectManagerUser->id,
        ]);

        $project2 = Project::create([
            'name' => $faker->sentence(3),
            'user_id' => $projectManagerUser->id,
        ]);

        $task1 = Task::create([
            'name' => 'Task 1 für Projekt 1',
            'project_id' => $project1->id,
        ]);

        $task2 = Task::create([
            'name' => 'Task 1 für Projekt 2',
            'project_id' => $project2->id,
        ]);

        History::create([
            'task_id' => $task1->id,
            'user_id' => $employeeUser->id,
            'action' => 'Task erstellt',
            'description' => 'Die Aufgabe wurde erstellt.',
        ]);

        History::create([
            'task_id' => $task2->id,
            'user_id' => $employeeUser->id,
            'action' => 'Task erstellt',
            'description' => 'Die Aufgabe wurde erstellt.',
        ]);
    }
}

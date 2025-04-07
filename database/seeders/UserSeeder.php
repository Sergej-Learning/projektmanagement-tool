<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ])->roles()->attach($adminRole);

        $projectLeaderRole = Role::where('name', 'Projektleiter')->first();
        $employeeRole = Role::where('name', 'Mitarbeiter')->first();

        User::create([
            'name' => 'Project Leader',
            'email' => 'leader@example.com',
            'password' => Hash::make('password')
        ])->roles()->attach($projectLeaderRole);

        User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password')
        ])->roles()->attach($employeeRole);
    }
}

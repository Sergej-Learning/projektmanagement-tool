<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Models\Project;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::where('name', 'Projekt 1')->first();

        Report::create([
            'project_id' => $project1->id,
            'report_type' => 'Wöchentlicher Fortschrittsbericht',
            'content' => 'Der Fortschritt des Projekts ist im Plan.',
        ]);
    }
}

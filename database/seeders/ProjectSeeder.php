<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            'Software development',
            'Construction projects',
            'IT projects',
            'Agency Projects',
            'Agile',
        ];
        foreach ($projects as $project) {
            Project::create(['project_name' => $project]);
        }
    }
}
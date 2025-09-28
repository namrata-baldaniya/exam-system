<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exam::updateOrCreate(
            ['title' => 'Laravel Basics Exam'],
            [
                'duration' => 10, 
                'passing_percentage' => 60,
                'start_time' => now()->subDay(),
                'end_time' => now()->addDay()
            ]
        );

        Exam::updateOrCreate(
            ['title' => 'General Knowledge Exam'],
            [
                'duration' => 15,
                'passing_percentage' => 60,
                'start_time' => now()->subDay(),
                'end_time' => now()->addDay()
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             $laravelExam = Exam::where('title','Laravel Basics Exam')->first();

        Question::updateOrCreate(
            ['exam_id' => $laravelExam->id, 'question_text' => 'What is Laravel?'],
            [
                'option1' => 'A PHP Framework',
                'option2' => 'A Java Framework',
                'option3' => 'A Python Library',
                'option4' => 'A Database',
                'correct_option' => 'option1',
                'category' => 'Laravel'
            ]
        );

        Question::updateOrCreate(
            ['exam_id' => $laravelExam->id, 'question_text' => 'Which command is used to create a new Laravel project?'],
            [
                'option1' => 'composer install',
                'option2' => 'composer create-project laravel/laravel',
                'option3' => 'php artisan serve',
                'option4' => 'npm install',
                'correct_option' => 'option2',
                'category' => 'Laravel'
            ]
        );

        $gkExam = Exam::where('title','General Knowledge Exam')->first();

        Question::updateOrCreate(
            ['exam_id' => $gkExam->id, 'question_text' => 'What is the capital of India?'],
            [
                'option1' => 'Mumbai',
                'option2' => 'New Delhi',
                'option3' => 'Kolkata',
                'option4' => 'Chennai',
                'correct_option' => 'option2',
                'category' => 'General Knowledge'
            ]
        );

        Question::updateOrCreate(
            ['exam_id' => $gkExam->id, 'question_text' => 'Which planet is known as the Red Planet?'],
            [
                'option1' => 'Earth',
                'option2' => 'Mars',
                'option3' => 'Jupiter',
                'option4' => 'Venus',
                'correct_option' => 'option2',
                'category' => 'Science'
            ]
        );
    }
}

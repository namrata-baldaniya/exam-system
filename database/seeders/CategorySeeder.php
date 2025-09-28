<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Math', 'Science', 'Laravel', 'PHP', 'General Knowledge'];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['name' => $cat]);
        }
    }
}

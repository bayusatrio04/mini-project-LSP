<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example: Create and insert a user
        $categories = [
            'Galang Dana',
            'Workshop',
            'Seminar',
            'Conference',
            'Exhibition',
            'Networking',
            'Rock',
            'Jazz',
            'Pop',
            'Classical',
            'EDM',
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
            ]);
        }

        // You can add more user records as needed
    }
}

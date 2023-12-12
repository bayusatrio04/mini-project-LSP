<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example: Create and insert a user
        DB::table('categories')->insert([
            [
                'category_name' => 'Concert',

                // 'isAdmin' => 0,

            ],
            [
                'category_name' => 'Galang Dana',

            ],
            [
                'category_name' => 'Kuliah Umum',

            ],
        ]);

        // You can add more user records as needed
    }
}

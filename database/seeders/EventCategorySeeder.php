<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('event_categories')->insert([
            [
                'id_event' => 1,
                'id_category' => 1
            ],
            [
                'id_event' => 1,
                'id_category' => 2
            ],

        ]);
    }
}

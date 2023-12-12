<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Konser Akbar 2',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'start_date' => '2023-12-12 08:15:45',
                'end_date' => '2023-12-12 22:15:45',
                'location' => 'Bogor, Jawa Barat',
                'ticket_price' => 200000,
                'total_tickets' => 40,
                'image_path' => 'event_img/cth_gambar.jpeg'

            ],

        ]);
    }
}

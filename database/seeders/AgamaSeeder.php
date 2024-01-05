<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agama;
use Illuminate\Support\Facades\DB;
class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agama')->insert([
            ['name' => 'Islam'],
            ['name' => 'Katolik'],
            ['name' => 'Kristen'],
            ['name' => 'Hindu'],
            ['name' => 'Budha'],
            ['name' => 'Lain-lain'],
        ]);
    }
}

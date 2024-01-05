<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example: Create and insert a user
        DB::table('users')->insert([
            [
                'name' => 'Customer 1',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'isAdmin' => 0,
                'gender' => 1, //0 male 1 female
                'ages' => 22,
                'no_telp'=> 814841,
                'alamat_lengkap' =>'Jambuuy',
                'id_provinsi' => 1,
                'id_kabupaten_kota'=>1,
                'id_agama'=>1,
                // 'isAdmin' => 0,

            ],
            [
                'name' => 'Customer 2',
                'email' => 'customer2@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'isAdmin' => 0,
                'gender' => 0, //0 male 1 female
                'ages' => 18,
                'no_telp'=> 814841,
                'alamat_lengkap' =>'Jambuuy',
                'id_provinsi' => 1,
                'id_kabupaten_kota'=>1,
                'id_agama'=>1,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'isAdmin' => 1,
                'gender' => 1, //0 male 1 female
                'ages' => 21,
                'no_telp'=> 814841,
                'alamat_lengkap' =>'Jambuuy',
                'id_provinsi' => 1,
                'id_kabupaten_kota'=>1,
                'id_agama'=>1,
            ],
        ]);

        // You can add more user records as needed
    }
}

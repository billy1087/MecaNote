<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'nama' => 'Dyah Amalina M',
            'email' => 'dyah80@gmail.com',
            'password' => Hash::make('12345678'),
            'no_telepon' => '085678456378',
            'role' => 'pemilik'
        ]);
        DB::table('users')->insert([
            'nama' => 'Amirul',
            'email' => 'ami80@gmail.com',
            'password' => Hash::make('12345678'),
            'no_telepon' => '08567890780',

        ]);

        DB::table('users')->insert([
            'nama' => 'Ayu Sekar',
            'email' => 'sekar80@gmail.com',
            'password' => Hash::make('12345678'),
            'no_telepon' => '08567845890',
        ]);
    }
}

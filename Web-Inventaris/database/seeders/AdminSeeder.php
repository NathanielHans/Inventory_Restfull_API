<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'telepon' =>'085345453454',
            'role' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}


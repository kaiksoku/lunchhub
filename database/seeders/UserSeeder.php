<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    { 
        User::create([
            'name' => 'Bryan Moreno',
            'email' => 'Kaiksoku@gmail.com',
            'password' => bcrypt('Kaiksoku2328'), 
        ])->assignRole('Admin');

        User::create([
            'name' => 'Skarleth Ardon',
            'email' => 'gskar30@gmail.com',
            'password' => bcrypt('Kaiksoku2328'), 
            ])->assignRole('Cajero');

    }
}

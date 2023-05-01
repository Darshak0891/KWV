<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'admin1', 'email' => 'admin1@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567890', 'is_admin' => 1]);
        User::create(['name' => 'admin2', 'email' => 'admin2@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567891', 'is_admin' => 1]);
        User::create(['name' => 'admin3', 'email' => 'admin3@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567892', 'is_admin' => 1]);
        User::create(['name' => 'webtime', 'email' => 'webtime@gmail.com', 'password' => Hash::make('dk@0891'), 'phone' => '8866601423', 'is_admin' => 1]);
    }
}

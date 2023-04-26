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
        User::create(['name' => 'test1', 'email' => 'test1@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567893', 'is_admin' => 0]);
        User::create(['name' => 'test2', 'email' => 'test2@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567894', 'is_admin' => 0]);
        User::create(['name' => 'test3', 'email' => 'test3@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567895', 'is_admin' => 0]);
        User::create(['name' => 'test4', 'email' => 'test4@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567896', 'is_admin' => 0]);
        User::create(['name' => 'test5', 'email' => 'test5@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567897', 'is_admin' => 0]);
        User::create(['name' => 'test6', 'email' => 'test6@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567898', 'is_admin' => 0]);
        User::create(['name' => 'test7', 'email' => 'test7@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567899', 'is_admin' => 0]);
        User::create(['name' => 'test8', 'email' => 'test8@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567821', 'is_admin' => 0]);
        User::create(['name' => 'test9', 'email' => 'test9@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567822', 'is_admin' => 0]);
        User::create(['name' => 'test10', 'email' => 'test10@gmail.com', 'password' => Hash::make('12345678'), 'phone' => '1234567823', 'is_admin' => 0]);
    }
}
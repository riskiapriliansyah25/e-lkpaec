<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'name' => 'Admin',
            'email' => null,
            'avatar' => null,
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
            'remember_token' => str_random(60),
        ]);
        User::create([
            'role' => 'pimpinan',
            'name' => 'Pimpinan',
            'email' => null,
            'avatar' => null,
            'username' => 'pimpinan',
            'password' => bcrypt('lkpaec123'),
            'remember_token' => str_random(60),
        ]);
    }
}

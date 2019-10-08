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
            'avatar' => null,
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
            'remember_token' => str_random(60),
        ]);
    }
}

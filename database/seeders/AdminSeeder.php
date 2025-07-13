<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'isAdmin' => true,
            'username' => 'admin',
            'email'  => 'admin@gmail.com',
            'password' => bcrypt('admin1234')

        ]);
    }
}

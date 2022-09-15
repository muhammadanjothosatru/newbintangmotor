<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'adminlamongan',
            'role' => '1',
            'email' => 'adminlamongan@gmail.com',
            'cabang_id' => '1',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'username' => 'adminbabat',
            'role' => '1',
            'email' => 'adminbabat@gmail.com',
            'cabang_id' => '2',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'username' => 'superadmin',
            'role' => '0',
            'email' => 'superadmin@gmail.com',
            'cabang_id' => '1',
            'password' => bcrypt('123456'),
        ]);
    }
}

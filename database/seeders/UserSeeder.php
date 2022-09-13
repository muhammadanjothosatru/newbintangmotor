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
            'role' => '0',
            'email' => 'admin@gmail.com',
            'cabang_id' => '1',
            'password' => bcrypt('123456'),
        ]);
    }
}

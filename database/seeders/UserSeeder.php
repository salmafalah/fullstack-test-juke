<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'name' => 'Salma Admin',
            'email' => 'salma@gmail.com',
            'username' => 'salmaadmin',
            'password' => Hash::make('1234Asd$$'),
        ]);
    }
}

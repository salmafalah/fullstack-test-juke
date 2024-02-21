<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'firstname' => 'Salma',
            'lastname' => 'Falah',
            'username' => 'salmaadmin',
            'city' => 'Bogor',
            'state' => 'Indonesia',
            'zip_code' => '12345',
            'address' => 'Ciampea Udih, Bogor'
        ]);
    }
}

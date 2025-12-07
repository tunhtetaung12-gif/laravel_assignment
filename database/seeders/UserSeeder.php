<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Mg Mg',
            'email'    => 'mgmg@gmail.com',
            'password' => Hash::make('password'),
            'address'  => 'Yangon, Myanmar',
            'phone'    => '09700000001',
            'gender'   => 'male',
        ]);
    }
}

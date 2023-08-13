<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@dev.com',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'editor',
            'email' => 'editor@dev.com',
            'password' => Hash::make('editor'),
        ]);


        User::create([
            'name' => 'client',
            'email' => 'client@dev.com',
            'password' => Hash::make('client'),
        ]);
    }
}

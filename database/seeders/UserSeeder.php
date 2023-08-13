<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@dev.com',
            'password' => Hash::make('admin'),
        ]);

        $admin->roles()->attach(Role::where('name', 'admin')->value('id'));

        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@dev.com',
            'password' => Hash::make('editor'),
        ]);

        $editor->roles()->attach(Role::where('name', 'editor')->value('id'));

        $client = User::create([
            'name' => 'client',
            'email' => 'client@dev.com',
            'password' => Hash::make('client'),
        ]);

        $client->roles()->attach(Role::where('name', 'client')->value('id'));
    }
}

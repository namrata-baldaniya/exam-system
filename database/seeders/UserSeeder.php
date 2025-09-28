<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $adminRole = Role::where('name', 'Admin')->first();
        $userRole = Role::where('name', 'User')->first();

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role_id' => $userRole->id
            ]
        );
        User::updateOrCreate([
            'name' => 'Test User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);

        User::updateOrCreate([
            'name' => 'Test User 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);

        User::updateOrCreate([
            'name' => 'Test User 3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);
    }
}

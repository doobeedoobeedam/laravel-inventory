<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin123',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ],
            [
                'name' => 'Citra',
                'username' => 'citra123',
                'password' => Hash::make('password123'),
                'is_admin' => false,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

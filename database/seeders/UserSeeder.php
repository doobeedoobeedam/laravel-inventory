<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        User::create([
            'nama' => 'Admin',
            'username' => 'admin123',
            'password' => Hash::make('password123'),
        ]);
    }
}

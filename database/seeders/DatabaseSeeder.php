<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            ItemSeeder::class,
            SupplierSeeder::class,
            UserSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder {
    public function run() {
        $suppliers = [
            [
                'supplier_code' => 'SUP001',
                'supplier_name' => 'Supplier One',
                'supplier_address' => '123 Main St, City A',
                'supplier_phone' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_code' => 'SUP002',
                'supplier_name' => 'Supplier Two',
                'supplier_address' => '456 Side St, City B',
                'supplier_phone' => '081298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}

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
                'supplier_name' => 'PT. Prima Jaya',
                'supplier_address' => 'Jl. Sudirman No. 10, Jakarta Pusat',
                'supplier_phone' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_code' => 'SUP002',
                'supplier_name' => 'CV. Maju Sejahtera',
                'supplier_address' => 'Jl. Gatot Subroto No. 45, Jakarta',
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

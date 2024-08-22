<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder {
    public function run() {
        $items = [
            [
                'item_code' => 'BRG001',
                'item_name' => 'Laptop',
                'specification' => 'Intel i5, 8GB RAM, 256GB SSD',
                'item_location' => 'Warehouse 1',
                'category' => 'Electronics',
                'condition' => 'New',
                'item_type' => 'Asset',
                'funding_source' => 'Company Funds',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code' => 'BRG002',
                'item_name' => 'Monitor',
                'specification' => '24 inch, LED, Full HD',
                'item_location' => 'Warehouse 2',
                'category' => 'Electronics',
                'condition' => 'New',
                'item_type' => 'Asset',
                'funding_source' => 'Company Funds',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}

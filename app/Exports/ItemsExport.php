<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles {
    public function collection() {
        return Item::select('item_name', 'specification', 'item_location', 'category', 'condition', 'item_type', 'funding_source')->get();
    }

    public function headings(): array {
        return [
            'Item Name',
            'Specification',
            'Location',
            'Category',
            'Condition',
            'Item Type',
            'Funding Source',
        ];
    }

    public function styles(Worksheet $sheet) {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => [
                        'rgb' => '14b8a6',
                    ],
                ],
            ],
        ];
    }
}


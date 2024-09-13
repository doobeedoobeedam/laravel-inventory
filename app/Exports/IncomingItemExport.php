<?php

namespace App\Exports;

use App\Models\IncomingItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IncomingItemExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles {
    protected $incomingItems;

    public function __construct($incomingItems) {
        $this->incomingItems = $incomingItems;
    }

    public function collection() {
        return $this->incomingItems->map(function ($incomingItem) {
            return [
                'Item Name' => $incomingItem->item->item_name ?? 'N/A',
                'Date of Entry' => $incomingItem->date_of_entry,
                'Quantity Entered' => $incomingItem->quantity_entered,
                'Supplier Name' => $incomingItem->supplier->supplier_name ?? 'N/A',
            ];
        });
    }

    public function headings(): array {
        return [
            'Item Name',
            'Date of Entry',
            'Quantity Entered',
            'Supplier Name',
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

<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StockExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles  {
    protected $stocks;

    public function __construct($stocks) {
        $this->stocks = $stocks;
    }
    
    public function collection() {
        return $this->stocks->map(function ($stock) {
            return [
                'Item Name' => $stock->item->item_name ?? 'N/A',
                'Quantity of Incoming Items' => $stock->quantity_of_incoming_items,
                'Quantity of Outgoing Items' => $stock->quantity_of_outgoing_items,
                'Total Items' => $stock->total_items,
            ];
        });
    }

    public function headings(): array {
        return [
            'Item Name',
            'Quantity of Incoming Items',
            'Quantity of Outgoing Items',
            'Total Items',
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

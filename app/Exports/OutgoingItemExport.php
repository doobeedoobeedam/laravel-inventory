<?php

namespace App\Exports;

use App\Models\OutgoingItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OutgoingItemExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles  {
    protected $outgoingItems;

    public function __construct($outgoingItems) {
        $this->outgoingItems = $outgoingItems;
    }
    
    public function collection() {
        return $this->outgoingItems->map(function ($outgoingItem) {
            return [
                'Item Name' => $outgoingItem->item->item_name ?? 'N/A',
                'Date of Exit' => $outgoingItem->date_of_exit,
                'Quantity Exited' => $outgoingItem->quantity_exited,
                'Purpose' => $outgoingItem->purpose,
            ];
        });
    }

    public function headings(): array {
        return [
            'Item Name',
            'Date of Exit',
            'Quantity Exited',
            'Purpose',
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

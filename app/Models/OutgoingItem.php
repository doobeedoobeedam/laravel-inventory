<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingItem extends Model {
    protected $fillable = [
        'item_code',
        'supplier_code',
        'date_of_exit',
        'quantity_exited',
        'purpose'
    ];

    public function item() {
        return $this->belongsTo(Item::class, 'item_code', 'item_code');
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_code', 'supplier_code');
    }

    protected static function booted() {
        static::deleted(function ($outgoingItem) {
            $item = $outgoingItem->item;
            $stock = $item->stock;

            if ($stock) {
                $stock->quantity_of_outgoing_items -= $outgoingItem->quantity_exited;
                $stock->total_items += $outgoingItem->quantity_exited;
                $stock->save();
            }
        });
    }
}

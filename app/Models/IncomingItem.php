<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingItem extends Model {
    protected $fillable = [
        'item_code',
        'date_of_entry',
        'quantity_entered',
        'supplier_code'
    ];

    public function item() {
        return $this->belongsTo(Item::class, 'item_code', 'item_code');
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_code', 'supplier_code');
    }

    protected static function booted() {
        static::deleted(function ($incomingItem) {
            $item = $incomingItem->item;
            $stock = $item->stock;

            if ($stock) {
                $stock->quantity_of_incoming_items -= $incomingItem->quantity_entered;
                $stock->total_items -= $incomingItem->quantity_entered;
                $stock->save();
            }
        });
    }

    use HasFactory;
}

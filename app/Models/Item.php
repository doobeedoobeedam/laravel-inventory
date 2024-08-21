<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $table = 'items';
    protected $fillable = [
        'item_code',
        'item_name',
        'specification',
        'item_location',
        'category',
        'condition',
        'item_type',
        'funding_source'
    ];

    public static function generateItemCode() {
        $prefix = 'BRG';

        $latestItem = self::orderBy('item_code', 'desc')->first();

        if ($latestItem) {
            $latestNumber = (int) substr($latestItem->item_code, strlen($prefix));
        } else {
            $latestNumber = 0;
        }

        $newNumber = str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);
        return $prefix . $newNumber;
    }

    public function incomingItems() {
        return $this->hasMany(IncomingItem::class, 'item_code', 'item_code');
    }

    public function stock() {
        return $this->hasOne(Stock::class, 'item_code', 'item_code');
    }

    use HasFactory;
}

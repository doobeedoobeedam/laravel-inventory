<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {
    protected $fillable = [
        'supplier_code',
        'supplier_name',
        'supplier_address',
        'supplier_phone',
    ];

    public static function generateSupplierCode() {
        $prefix = 'SUP';

        $latestSupplier = self::orderBy('supplier_code', 'desc')->first();

        if ($latestSupplier) {
            $latestNumber = (int) substr($latestSupplier->supplier_code, strlen($prefix));
        } else {
            $latestNumber = 0;
        }

        $newNumber = str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);
        return $prefix . $newNumber;
    }

    public function incomingItems() {
        return $this->hasMany(IncomingItem::class, 'supplier_code', 'supplier_code');
    }

    use HasFactory;
}

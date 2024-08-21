<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model {
    protected $primaryKey = 'item_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'item_code',
        'quantity_of_incoming_items',
        'quantity_of_outgoing_items',
        'total_items'
    ];

    public function item() {
        return $this->belongsTo(Item::class, 'item_code', 'item_code');
    }
}

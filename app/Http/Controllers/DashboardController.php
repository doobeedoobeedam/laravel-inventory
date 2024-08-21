<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Item;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('index', [
            'title' => 'Dashboard',
            'totalSuppliers' => Supplier::count(),
            'totalItems' => Item::count(),
            'totalIncomingItems' => Stock::sum('quantity_of_incoming_items'),
            'totalOutgoingItems' => Stock::sum('quantity_of_outgoing_items'),
            'totalStock' => Stock::sum('total_items')
        ]);
    }
}

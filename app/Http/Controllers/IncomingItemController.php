<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\IncomingItem;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class IncomingItemController extends Controller {
    public function index() {
        return view('incomingItems.index', [
            'title' => 'Incoming Items',
            'incomingItems' => IncomingItem::with('item', 'supplier')->get(),
        ]);
    }

    public function create() {
        return view('incomingItems.create', [
            'title' => 'Create New',
            'items' => Item::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'item_code' => 'required|string|exists:items,item_code',
            'date_of_entry' => 'required|date',
            'quantity_entered' => 'required|integer|min:1',
            'supplier_code' => 'required|string|exists:suppliers,supplier_code',
        ]);

        IncomingItem::create([
            'item_code' => $validatedData['item_code'],
            'supplier_code' => $validatedData['supplier_code'],
            'date_of_entry' => $validatedData['date_of_entry'],
            'quantity_entered' => $validatedData['quantity_entered'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $stock = Stock::where('item_code', $validatedData['item_code'])->first();

        if ($stock) {
            $stock->quantity_of_incoming_items += $validatedData['quantity_entered'];
            $stock->total_items += $validatedData['quantity_entered'];
            $stock->updated_at = now();
            $stock->update();
        } else {
            Stock::create([
                'item_code' => $validatedData['item_code'],
                'quantity_of_incoming_items' => $validatedData['quantity_entered'],
                'quantity_of_outgoing_items' => 0,
                'total_items' => $validatedData['quantity_entered'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->route('incomingItems.index')->with('success', 'Incoming item added and stock updated successfully.');
    }

    public function destroy($id) {
        $incomingItem = IncomingItem::findOrFail($id);
        $incomingItem->delete();
        return redirect()->route('incomingItems.index')->with('success', 'Incoming item deleted successfully.');
    }

}

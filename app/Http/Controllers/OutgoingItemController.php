<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\OutgoingItem;
use App\Models\Supplier;
use App\Models\Stock;
use Illuminate\Http\Request;

class OutgoingItemController extends Controller {
    public function index() {
        return view('outgoingItems.index', [
            'title' => 'Outgoing Items',
            'outgoingItems' => OutgoingItem::all()
        ]);
    }

    public function create() {
        return view('outgoingItems.create', [
            'title' => 'Create New',
            'items' => Item::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'item_code' => 'required|string|exists:items,item_code',
            'date_of_exit' => 'required|date',
            'quantity_exited' => 'required|integer|min:1',
            'purpose' => 'nullable|string',
        ]);

        $stock = Stock::where('item_code', $validatedData['item_code'])->first();

        if (!$stock) {
            return redirect()->back()->withErrors(['item_code' => 'Stock not found.']);
        }
    
        if ($validatedData['quantity_exited'] > $stock->total_items) {
            return redirect()->back()->withErrors(['quantity_exited' => 'Quantity exceeds available stock.']);
        }

        OutgoingItem::create([
            'item_code' => $validatedData['item_code'],
            'date_of_exit' => $validatedData['date_of_exit'],
            'quantity_exited' => $validatedData['quantity_exited'],
            'purpose' => $validatedData['purpose'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($stock) {
            $stock->quantity_of_outgoing_items += $validatedData['quantity_exited'];
            $stock->total_items -= $validatedData['quantity_exited'];
            $stock->updated_at = now();
            $stock->update();
        } else {
            Stock::create([
                'item_code' => $validatedData['item_code'],
                'quantity_of_incoming_items' => 0,
                'quantity_of_outgoing_items' => $validatedData['quantity_exited'],
                'total_items' => $validatedData['quantity_exited'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->route('outgoingItems.index')->with('success', 'Outgoing item added and stock updated successfully.');
    }

    public function destroy($id) {
        $outgoingItem = OutgoingItem::findOrFail($id);
        $outgoingItem->delete();
        return redirect()->route('outgoingItems.index')->with('success', 'Outgoing item deleted successfully.');
    }
}

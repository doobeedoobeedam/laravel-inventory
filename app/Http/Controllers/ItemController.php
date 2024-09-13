<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Stock;
use App\Exports\ItemsExport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller {
    public function index() {
        return view('items.index', [
            'title' => 'Items',
            'items' => Item::all()
        ]);
    }

    public function exportExcel() {
        return Excel::download(new ItemsExport, 'items_report.xlsx');
    }

    public function create() {
        return view('items.create', [
            'title' => 'Create New'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'specification' => 'required|string',
            'item_location' => 'required|string',
            'category' => 'required|string',
            'condition' => 'required|string',
            'item_type' => 'required|string',
            'funding_source' => 'required|string',
        ]);

        $itemCode = Item::generateItemCode();

        Item::create([
            'item_code' => $itemCode,
            'item_name' => $request->item_name,
            'specification' => $request->specification,
            'item_location' => $request->item_location,
            'category' => $request->category,
            'condition' => $request->condition,
            'item_type' => $request->item_type,
            'funding_source' => $request->funding_source,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Stock::create([
            'item_code' => $itemCode,
            'quantity_of_incoming_items' => 0,
            'quantity_of_outgoing_items' => 0,
            'total_items' => 0,
        ]);
        
        return redirect()->route('items.index')->with('success', 'Item successfully added.');
    }

    public function edit($item_code) {
        $item = item::where('item_code', $item_code)->firstOrFail();
        return view('items.edit', [
            'title' => 'Edit Item',
            'item' => $item
        ]);
    }

    public function update(Request $request, $item_code) {
        $item = item::where('item_code', $item_code)->firstOrFail();

        $request->validate([
            'item_name' => 'required|string|max:255',
            'specification' => 'required|string',
            'item_location' => 'required|string',
            'category' => 'required|string',
            'condition' => 'required|string',
            'item_type' => 'required|string',
            'funding_source' => 'required|string',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id) {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}

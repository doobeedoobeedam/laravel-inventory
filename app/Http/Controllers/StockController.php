<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller {
    public function index() {
        $stocks = Stock::with('item')->get();
        return view('stocks.index', [
            'title' => 'Stocks',
            'stocks' => $stocks
        ]);
    }

    public function exportExcel() {
        $stocks = Stock::with(['item'])->select('item_code', 'quantity_of_incoming_items', 'quantity_of_outgoing_items', 'total_items')->get();
        return Excel::download(new StockExport($stocks), 'stocks_report.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Exports\SuppliersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller {
    public function index() {
        return view('suppliers.index', [
            'title' => 'Suppliers',
            'suppliers' => Supplier::all()
        ]);
    }

    public function exportExcel() {
        return Excel::download(new SuppliersExport, 'suppliers_report.xlsx');
    }

    public function create() {
        return view('suppliers.create', [
            'title' => 'Create New'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_phone' => 'required|string',
            'supplier_address' => 'required|string'
        ]);

        $supplierCode = Supplier::generateSupplierCode();

        Supplier::create([
            'supplier_code' => $supplierCode,
            'supplier_name' => $request->supplier_name,
            'supplier_phone' => $request->supplier_phone,
            'supplier_address' => $request->supplier_address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect()->route('suppliers.index')->with('success', 'Supplier successfully added.');
    }

    public function edit($supplier_code) {
        $supplier = Supplier::where('supplier_code', $supplier_code)->firstOrFail();
        return view('suppliers.edit', [
            'title' => 'Edit Supplier',
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, $supplier_code) {
        $supplier = Supplier::where('supplier_code', $supplier_code)->firstOrFail();

        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_phone' => 'required|string',
            'supplier_address' => 'required|string'
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id) {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}

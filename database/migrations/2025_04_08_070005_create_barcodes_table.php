<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        $barcodes = Barcode::all();  // Get all barcodes
        return view('barcodes.index', compact('barcodes'));
    }

    public function create()
    {
        return view('barcodes.create');  // Return the barcode creation form
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:barcodes',
            'quantity' => 'required|integer',
        ]);

        Barcode::create($request->all());  // Create a new barcode record

        return redirect()->route('barcodes.index')->with('success', 'Barcode created successfully.');
    }

    public function edit(Barcode $barcode)
    {
        return view('barcodes.edit', compact('barcode'));  // Return the edit form with barcode data
    }

    public function update(Request $request, Barcode $barcode)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:barcodes,product_code,' . $barcode->id,
            'quantity' => 'required|integer',
        ]);

        $barcode->update($request->all());  // Update the barcode record

        return redirect()->route('barcodes.index')->with('success', 'Barcode updated successfully.');
    }

    public function destroy(Barcode $barcode)
    {
        $barcode->delete();  // Delete the barcode record

        return redirect()->route('barcodes.index')->with('success', 'Barcode deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        $barcodes = Barcode::all();
        return view('barcodes.index', compact('barcodes'));
    }

    public function create()
    {
        return view('barcodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:barcodes',
            'quantity' => 'required|integer',
            'barcode_print' => 'required|in:barcode,qr_code',
        ]);

        Barcode::create($request->all());

        return redirect()->route('barcodes.index')->with('success', 'Barcode created successfully.');
    }

    public function edit(Barcode $barcode)
    {
        return view('barcodes.edit', compact('barcode'));
    }

    public function update(Request $request, Barcode $barcode)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:barcodes,product_code,' . $barcode->id,
            'quantity' => 'required|integer',
            'barcode_print' => 'required|in:barcode,qr_code',
        ]);

        $barcode->update($request->all());

        return redirect()->route('barcodes.index')->with('success', 'Barcode updated successfully.');
    }

    public function destroy(Barcode $barcode)
    {
        $barcode->delete();
        return redirect()->route('barcodes.index')->with('success', 'Barcode deleted successfully.');
    }
}

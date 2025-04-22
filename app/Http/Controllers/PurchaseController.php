<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'product'])->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference'     => 'required|unique:purchases',
            'supplier_id'   => 'required|exists:suppliers,id',
            'product_id'    => 'required|exists:products,id',
            'date'          => 'required|date',
            'tax'           => 'nullable|numeric',
            'discount'      => 'nullable|numeric',
            'shipping'      => 'nullable|numeric',
            'total_amount'  => 'required|numeric',
            'status'        => 'required|in:Pending,Approved,Rejected',
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully!');
    }

    public function show($id)
    {
        $purchase = Purchase::with(['supplier', 'product'])->findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.edit', compact('purchase', 'suppliers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reference'     => 'required|unique:purchases,reference,' . $id,
            'supplier_id'   => 'required|exists:suppliers,id',
            'product_id'    => 'required|exists:products,id',
            'date'          => 'required|date',
            'tax'           => 'nullable|numeric',
            'discount'      => 'nullable|numeric',
            'shipping'      => 'nullable|numeric',
            'total_amount'  => 'required|numeric',
            'status'        => 'required|in:Pending,Approved,Rejected',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully!');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully!');
    }
}

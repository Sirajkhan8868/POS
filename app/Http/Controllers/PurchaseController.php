<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Customer;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('customer')->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('purchases.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:purchases',
            'customer_id' => 'required',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $purchase = Purchase::create($request->all());

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $purchase->items()->create($item);
            }
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully!');
    }

    public function show($id)
    {
        $purchase = Purchase::with('items')->findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = Purchase::with('items')->findOrFail($id);
        $customers = Customer::all();
        return view('purchases.edit', compact('purchase', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|unique:purchases,reference,' . $id,
            'customer_id' => 'required',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());

        foreach ($request->items as $item) {
            $purchase->items()->create($item);
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully!');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully!');
    }
}

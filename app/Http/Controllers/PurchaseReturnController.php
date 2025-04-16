<?php

namespace App\Http\Controllers;

use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function index()
    {
        $returns = PurchaseReturn::all();
        return view('purchasereturns.index', compact('returns'));
    }

    public function create()
    {
        return view('purchasereturns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:purchase_returns',
            'supplier' => 'required',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $purchaseReturn = PurchaseReturn::create($request->all());

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $purchaseReturn->items()->create($item);
            }
        }

        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return created successfully!');
    }

    public function show($id)
    {
        $purchaseReturn = PurchaseReturn::with('items')->findOrFail($id);
        return view('purchasereturns.show', compact('purchaseReturn'));
    }

    public function edit($id)
    {
        $purchaseReturn = PurchaseReturn::with('items')->findOrFail($id);
        return view('purchasereturns.edit', compact('purchaseReturn'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|unique:purchase_returns,reference,' . $id,
            'supplier' => 'required',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->update($request->all());

        foreach ($request->items as $item) {
            $purchaseReturn->items()->create($item);
        }

        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return updated successfully!');
    }

    public function destroy($id)
    {
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->delete();
        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return deleted successfully!');
    }
}

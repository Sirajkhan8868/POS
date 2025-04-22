<?php

namespace App\Http\Controllers;

use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function index()
    {
        $returns = PurchaseReturn::with('supplier')->latest()->get();
        return view('purchasereturns.index', compact('returns'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchasereturns.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|unique:purchase_returns',
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.tax' => 'nullable|numeric|min:0',
        ]);

        $purchaseReturn = PurchaseReturn::create($validated);

        foreach ($request->items as $item) {
            $item['purchase_return_id'] = $purchaseReturn->id;
            PurchaseReturnItem::create($item);
        }

        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return created successfully!');
    }

    public function show($id)
    {
        $purchaseReturn = PurchaseReturn::with(['items.product', 'supplier'])->findOrFail($id);
        return view('purchasereturns.show', compact('purchaseReturn'));
    }

    public function edit($id)
    {
        $purchaseReturn = PurchaseReturn::with('items')->findOrFail($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchasereturns.edit', compact('purchaseReturn', 'suppliers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reference' => 'required|unique:purchase_returns,reference,' . $id,
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.tax' => 'nullable|numeric|min:0',
        ]);

        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->update($validated);

        $purchaseReturn->items()->delete();

        foreach ($request->items as $item) {
            $item['purchase_return_id'] = $purchaseReturn->id;
            PurchaseReturnItem::create($item);
        }

        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return updated successfully!');
    }

    public function destroy($id)
    {
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->items()->delete();
        $purchaseReturn->delete();
        return redirect()->route('purchasereturns.index')->with('success', 'Purchase Return deleted successfully!');
    }
}

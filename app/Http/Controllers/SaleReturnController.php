<?php

namespace App\Http\Controllers;

use App\Models\SaleReturn;
use App\Models\SaleReturnItem;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleReturnController extends Controller
{
    public function index()
    {
        $returns = SaleReturn::with('items')->latest()->get();
        return view('sale_returns.index', compact('returns'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sale_returns.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|unique:sale_returns,reference',
            'customer' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax_percentage' => 'nullable|numeric',
            'discount_percentage' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'payment_method' => 'required|string',
            'amount_paid' => 'required|numeric|min:0',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'unit_price' => 'required|array',
            'quantity' => 'required|array',
            'product_discount' => 'required|array',
            'product_tax' => 'required|array',
            'sub_total' => 'required|array',
        ]);

        $return = SaleReturn::create([
            'reference' => $validated['reference'],
            'customer_id' => $validated['customer'],
            'date' => $validated['date'],
            'tax' => $validated['tax_percentage'] ?? 0,
            'discount' => $validated['discount_percentage'] ?? 0,
            'shipping' => $validated['shipping'] ?? 0,
            'total_amount' => $validated['total_amount'],
            'status' => $validated['status'],
            'payment_method' => $validated['payment_method'],
            'amount_paid' => $validated['amount_paid'],
            'note' => $request->note ?? null,
        ]);

        foreach ($validated['product_id'] as $index => $productId) {
            SaleReturnItem::create([
                'sale_return_id' => $return->id,
                'product_id' => $productId,
                'unit_price' => $validated['unit_price'][$index],
                'quantity' => $validated['quantity'][$index],
                'discount' => $validated['product_discount'][$index],
                'tax' => $validated['product_tax'][$index],
                'sub_total' => $validated['sub_total'][$index],
            ]);
        }

        return redirect()->route('sale_returns.index')->with('success', 'Sale return recorded successfully.');
    }

    public function show(SaleReturn $sale_return)
    {
        $sale_return->load('items.product');
        return view('sale_returns.show', compact('sale_return'));
    }

    public function edit(SaleReturn $sale_return)
    {
        $products = Product::all();
        $sale_return->load('items');
        return view('sale_returns.edit', compact('sale_return', 'products'));
    }

    public function update(Request $request, SaleReturn $sale_return)
    {
        $validated = $request->validate([
            'reference' => 'required|unique:sale_returns,reference,' . $sale_return->id,
            'customer' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax_percentage' => 'nullable|numeric',
            'discount_percentage' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'payment_method' => 'required|string',
            'amount_paid' => 'required|numeric|min:0',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'unit_price' => 'required|array',
            'quantity' => 'required|array',
            'product_discount' => 'required|array',
            'product_tax' => 'required|array',
            'sub_total' => 'required|array',
        ]);

        $sale_return->update([
            'reference' => $validated['reference'],
            'customer_id' => $validated['customer'],
            'date' => $validated['date'],
            'tax' => $validated['tax_percentage'] ?? 0,
            'discount' => $validated['discount_percentage'] ?? 0,
            'shipping' => $validated['shipping'] ?? 0,
            'total_amount' => $validated['total_amount'],
            'status' => $validated['status'],
            'payment_method' => $validated['payment_method'],
            'amount_paid' => $validated['amount_paid'],
            'note' => $request->note ?? null,
        ]);

        $sale_return->items()->delete();

        foreach ($validated['product_id'] as $index => $productId) {
            SaleReturnItem::create([
                'sale_return_id' => $sale_return->id,
                'product_id' => $productId,
                'unit_price' => $validated['unit_price'][$index],
                'quantity' => $validated['quantity'][$index],
                'discount' => $validated['product_discount'][$index],
                'tax' => $validated['product_tax'][$index],
                'sub_total' => $validated['sub_total'][$index],
            ]);
        }

        return redirect()->route('sale_returns.index')->with('success', 'Sale return updated successfully.');
    }

    public function destroy(SaleReturn $sale_return)
    {
        $sale_return->delete();
        return redirect()->route('sale_returns.index')->with('success', 'Sale return deleted successfully.');
    }
}

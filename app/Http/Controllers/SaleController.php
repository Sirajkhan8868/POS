<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('items')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reference' => 'required|unique:sales',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax_percentage' => 'nullable|numeric',
            'discount_percentage' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'amount_paid' => 'required|numeric|min:0',
            'note' => 'nullable|string',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'required|exists:products,id',
            'unit_price' => 'required|array|min:1',
            'unit_price.*' => 'required|numeric|min:0',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'product_discount' => 'required|array',
            'product_tax' => 'required|array',
            'sub_total' => 'required|array|min:1',
        ]);

        $subtotal = array_sum($data['sub_total']);
        $taxAmount = $subtotal * (($data['tax_percentage'] ?? 0) / 100);
        $discountAmount = $subtotal * (($data['discount_percentage'] ?? 0) / 100);
        $shipping = $data['shipping'] ?? 0;

        $total_amount = $subtotal + $taxAmount - $discountAmount + $shipping;

        $sale = Sale::create([
            'reference' => $data['reference'],
            'customer_id' => $data['customer_id'],
            'date' => $data['date'],
            'tax' => $data['tax_percentage'] ?? 0,
            'discount' => $data['discount_percentage'] ?? 0,
            'shipping' => $shipping,
            'total_amount' => $total_amount,
            'amount_paid' => $data['amount_paid'],
            'status' => $data['status'],
            'note' => $data['note'] ?? null,
        ]);

        foreach ($data['product_id'] as $index => $productId) {
            $sale->items()->create([
                'product_id' => $productId,
                'quantity' => $data['quantity'][$index],
                'price' => $data['unit_price'][$index],
                'discount' => $data['product_discount'][$index],
                'tax' => $data['product_tax'][$index],
                'subtotal' => $data['sub_total'][$index],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show($id)
    {
        $sale = Sale::with('items.product', 'customer')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::with('items')->findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('sales.edit', compact('sale', 'products', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $data = $request->validate([
            'reference' => 'required|unique:sales,reference,' . $sale->id,
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax_percentage' => 'nullable|numeric',
            'discount_percentage' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'amount_paid' => 'required|numeric|min:0',
            'note' => 'nullable|string',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'required|exists:products,id',
            'unit_price' => 'required|array|min:1',
            'unit_price.*' => 'required|numeric|min:0',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'product_discount' => 'required|array',
            'product_tax' => 'required|array',
            'sub_total' => 'required|array|min:1',
        ]);

        $subtotal = array_sum($data['sub_total']);
        $taxAmount = $subtotal * (($data['tax_percentage'] ?? 0) / 100);
        $discountAmount = $subtotal * (($data['discount_percentage'] ?? 0) / 100);
        $shipping = $data['shipping'] ?? 0;

        $total_amount = $subtotal + $taxAmount - $discountAmount + $shipping;

        $sale->update([
            'reference' => $data['reference'],
            'customer_id' => $data['customer_id'],
            'date' => $data['date'],
            'tax' => $data['tax_percentage'] ?? 0,
            'discount' => $data['discount_percentage'] ?? 0,
            'shipping' => $shipping,
            'total_amount' => $total_amount,
            'amount_paid' => $data['amount_paid'],
            'status' => $data['status'],
            'note' => $data['note'] ?? null,
        ]);

        $sale->items()->delete();

        foreach ($data['product_id'] as $index => $productId) {
            $sale->items()->create([
                'product_id' => $productId,
                'quantity' => $data['quantity'][$index],
                'price' => $data['unit_price'][$index],
                'discount' => $data['product_discount'][$index],
                'tax' => $data['product_tax'][$index],
                'subtotal' => $data['sub_total'][$index],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->items()->delete();
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}

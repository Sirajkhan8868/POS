<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::with(['customer', 'items'])->get();
        return view('quotations.index', compact('quotations'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $latestQuotation = Quotation::latest('id')->first();
        $nextQuotationNumber = $latestQuotation ? $latestQuotation->id + 1 : 1;

        return view('quotations.create', compact('customers', 'products', 'nextQuotationNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $quotation = Quotation::create([
            'reference' => 'QUO-' . strtoupper(uniqid()),
            'customer_id' => $request->customer_id,
            'date' => $request->date,
            'tax' => $request->tax ?? 0,
            'discount' => $request->discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'total_amount' => $request->total_amount,
            'status' => $request->status ?? 'Pending',
            'note' => $request->note,
        ]);

        foreach ($request->items as $item) {
            $quotation->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['quantity'] * $item['price'],
            ]);
        }

        return redirect()->route('quotations.index')->with('success', 'Quotation created successfully.');
    }

    public function edit($id)
    {
        $quotation = Quotation::with('items')->findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();

        return view('quotations.edit', compact('quotation', 'customers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $quotation = Quotation::findOrFail($id);
        $quotation->update([
            'customer_id' => $request->customer_id,
            'date' => $request->date,
            'tax' => $request->tax ?? 0,
            'discount' => $request->discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'total_amount' => $request->total_amount,
            'status' => $request->status ?? 'Pending',
            'note' => $request->note,
        ]);

        $quotation->items()->delete();

        foreach ($request->items as $item) {
            $quotation->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['quantity'] * $item['price'],
            ]);
        }

        return redirect()->route('quotations.index')->with('success', 'Quotation updated successfully.');
    }

    public function show($id)
    {
        $quotation = Quotation::with(['customer', 'items.product'])->findOrFail($id);
        return view('quotations.show', compact('quotation'));
    }

    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->items()->delete();
        $quotation->delete();

        return redirect()->route('quotations.index')->with('success', 'Quotation deleted successfully.');
    }
}

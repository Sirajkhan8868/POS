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
        $quotations = Quotation::with(['product', 'customer'])->get();
        return view('quotations.index', compact('quotations'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('quotations.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:quotations',
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id', // updated
            'date' => 'required|date',
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'shipping' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        Quotation::create($request->all());

        return redirect()->route('quotations.index')->with('success', 'Quotation created successfully.');
    }

    public function edit(Quotation $quotation)
    {
        $products = Product::all();
        $customers = Customer::all(); // add this
        return view('quotations.edit', compact('quotation', 'products', 'customers'));
    }

    public function update(Request $request, Quotation $quotation)
    {
        $request->validate([
            'reference' => 'required|unique:quotations,reference,' . $quotation->id,
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id', // updated
            'date' => 'required|date',
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'shipping' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $quotation->update($request->all());

        return redirect()->route('quotations.index')->with('success', 'Quotation updated successfully.');
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return redirect()->route('quotations.index')->with('success', 'Quotation deleted successfully.');
    }

    public function show(Quotation $quotation)
    {
        $quotation->load(['product', 'customer']);
        return view('quotations.show', compact('quotation'));
    }
}

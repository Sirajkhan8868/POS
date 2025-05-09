<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $quotations = Quotation::when($search, function ($query) use ($search) {
            return $query->where('reference', 'like', '%' . $search . '%')
                         ->orWhereHas('customer', function ($query) use ($search) {
                             $query->where('customer_name', 'like', '%' . $search . '%');
                         });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('quotations.index', compact('quotations'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('quotations.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:quotations,reference',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'note' => 'nullable|string',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.net_unit_price' => 'required|numeric',
            'items.*.discount' => 'nullable|numeric',
            'items.*.tax' => 'nullable|numeric',
            'items.*.subtotal' => 'required|numeric',
        ]);

        $quotation = Quotation::create($request->only([
            'reference', 'customer_id', 'date', 'tax', 'discount',
            'shipping', 'total_amount', 'status', 'note'
        ]));

        foreach ($request->items as $item) {
            $quotation->items()->create($item);
        }

        $this->updateTotalAmount($quotation);

        return redirect()->route('quotations.index')->with('success', 'Quotation created successfully.');
    }

    public function show($id)
    {
        $quotation = Quotation::with(['customer', 'items.product'])->findOrFail($id);
        return view('quotations.show', compact('quotation'));
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
            'reference' => 'required|unique:quotations,reference,' . $id,
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'note' => 'nullable|string',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.net_unit_price' => 'required|numeric',
            'items.*.discount' => 'nullable|numeric',
            'items.*.tax' => 'nullable|numeric',
            'items.*.subtotal' => 'required|numeric',
        ]);

        $quotation = Quotation::findOrFail($id);

        $quotation->update($request->only([
            'reference', 'customer_id', 'date', 'tax', 'discount',
            'shipping', 'total_amount', 'status', 'note'
        ]));

        // Delete old items and recreate
        $quotation->items()->delete();

        foreach ($request->items as $item) {
            $quotation->items()->create($item);
        }

        $this->updateTotalAmount($quotation);

        return redirect()->route('quotations.index')->with('success', 'Quotation updated successfully.');
    }

    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->items()->delete();
        $quotation->delete();

        return redirect()->route('quotations.index')->with('success', 'Quotation deleted successfully.');
    }

    private function updateTotalAmount(Quotation $quotation)
    {
        $totalAmount = $quotation->items->sum(function ($item) {
            $subtotal = $item->quantity * $item->net_unit_price;
            $discount = $item->discount ? $subtotal * ($item->discount / 100) : 0;
            $tax = $item->tax ? ($subtotal - $discount) * ($item->tax / 100) : 0;
            return $subtotal - $discount + $tax;
        });

        $totalAmount += $quotation->shipping ?? 0;
        $totalAmount -= $quotation->discount ?? 0;
        $totalAmount += $quotation->tax ?? 0;

        $quotation->total_amount = round($totalAmount, 2);
        $quotation->save();
    }
}

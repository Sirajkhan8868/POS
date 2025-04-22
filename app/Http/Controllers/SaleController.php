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
            'tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $subtotal = 0;
        foreach ($data['items'] as &$item) {
            $item['subtotal'] = $item['quantity'] * $item['price'];
            $subtotal += $item['subtotal'];
        }

        $sale = Sale::create([
            'reference' => $data['reference'],
            'customer_id' => $data['customer_id'],
            'date' => $data['date'],
            'tax' => $data['tax'] ?? 0,
            'discount' => $data['discount'] ?? 0,
            'shipping' => $data['shipping'] ?? 0,
            'status' => $data['status'],
            'total_amount' => $subtotal + ($data['tax'] ?? 0) + ($data['shipping'] ?? 0) - ($data['discount'] ?? 0),
        ]);

        foreach ($data['items'] as $item) {
            $sale->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }
}

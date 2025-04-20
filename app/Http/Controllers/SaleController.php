<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
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
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reference' => 'required|unique:sales',
            'customer' => 'required',
            'date' => 'required|date',
            'tax' => 'numeric',
            'discount' => 'numeric',
            'shipping' => 'numeric',
            'status' => 'required',
            'items' => 'required|array'
        ]);

        $sale = Sale::create([
            'reference' => $data['reference'],
            'customer' => $data['customer'],
            'date' => $data['date'],
            'tax' => $data['tax'],
            'discount' => $data['discount'],
            'shipping' => $data['shipping'],
            'status' => $data['status'],
            'total_amount' => $this->calculateTotal($data)
        ]);

        foreach ($data['items'] as $item) {
            $sale->items()->create($item);
        }

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    private function calculateTotal($data)
    {
        $subtotal = array_sum(array_column($data['items'], 'subtotal'));
        return $subtotal + $data['tax'] + $data['shipping'] - $data['discount'];
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\StockAdjustment;
use App\Models\StockAdjustmentItem;
use App\Models\Product;
use Illuminate\Http\Request;

class StockAdjustmentController extends Controller
{
    public function index()
    {
        $adjustments = StockAdjustment::with('items')->get();
        return view('stock_adjustments.index', compact('adjustments'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock_adjustments.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:stock_adjustments',
            'date' => 'required|date',
            'product_id.*' => 'required',
            'quantity.*' => 'required|numeric',
            'type.*' => 'required|in:increase,decrease',
        ]);

        $adjustment = StockAdjustment::create($request->only('reference', 'date', 'note'));

        foreach ($request->product_id as $index => $productId) {
            StockAdjustmentItem::create([
                'adjustment_id' => $adjustment->id,
                'product_id' => $productId,
                'stock' => $request->stock[$index],
                'code' => $request->code[$index],
                'quantity' => $request->quantity[$index],
                'type' => $request->type[$index],
            ]);
        }

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment created successfully.');
    }

    public function show(StockAdjustment $stockAdjustment)
    {
        $stockAdjustment->load('items.product');
        return view('stock_adjustments.show', compact('stockAdjustment'));
    }

    public function destroy(StockAdjustment $stockAdjustment)
    {
        $stockAdjustment->items()->delete();
        $stockAdjustment->delete();

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment deleted.');
    }
}

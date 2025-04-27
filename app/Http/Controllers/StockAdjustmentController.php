<?php

namespace App\Http\Controllers;

use App\Models\StockAdjustment;
use App\Models\StockAdjustmentItem;
use App\Models\Product;
use Illuminate\Http\Request;

class StockAdjustmentController extends Controller
{
    /**
     * Display a listing of the stock adjustments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments = StockAdjustment::with('items.product')->get();
        return view('stock_adjustments.index', compact('adjustments'));
    }

    /**
     * Show the form for creating a new stock adjustment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('stock_adjustments.create', compact('products'));
    }

    /**
     * Store a newly created stock adjustment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:stock_adjustments,reference',
            'date' => 'required|date',
            'product_id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|numeric|min:1',
            'type.*' => 'required|in:increase,decrease',
        ]);

        $adjustment = StockAdjustment::create([
            'reference' => $request->reference,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        foreach ($request->product_id as $index => $productId) {
            StockAdjustmentItem::create([
                'adjustment_id' => $adjustment->id,
                'product_id' => $productId,
                'stock' => $request->stock[$index],
                'code' => $request->code[$index],
                'quantity' => $request->quantity[$index],
                'type' => $request->type[$index],
            ]);

            $product = Product::find($productId);
            if ($request->type[$index] == 'increase') {
                $product->stock += $request->quantity[$index];
            } else {
                $product->stock -= $request->quantity[$index];
            }
            $product->save();
        }

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment created successfully.');
    }

    /**
     * Display the specified stock adjustment.
     *
     * @param \App\Models\StockAdjustment $stockAdjustment
     * @return \Illuminate\Http\Response
     */
    public function show(StockAdjustment $stockAdjustment)
    {
        $stockAdjustment->load('items.product');
        return view('stock_adjustments.show', compact('stockAdjustment'));
    }

    /**
     * Remove the specified stock adjustment from storage.
     *
     * @param \App\Models\StockAdjustment $stockAdjustment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockAdjustment $stockAdjustment)
    {
        $stockAdjustment->items()->delete();
        $stockAdjustment->delete();

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment deleted.');
    }
}

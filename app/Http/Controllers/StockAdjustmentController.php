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
        $adjustments = StockAdjustment::with('items.product')->latest()->get();
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
            'reference' => 'required|unique:stock_adjustments,reference',
            'date' => 'required|date',
            'product_id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|numeric|min:1',
            'type.*' => 'required|in:increase,decrease',
        ]);

        $adjustment = StockAdjustment::create([
            'reference' => $request->reference,
            'date' => $request->date,
            'note' => $request->note ?? null,
        ]);

        foreach ($request->product_id as $index => $productId) {
            StockAdjustmentItem::create([
                'adjustment_id' => $adjustment->id,
                'product_id' => $productId,
                'stock' => $request->stock[$index] ?? 0,
                'code' => $request->code[$index] ?? null,
                'quantity' => $request->quantity[$index],
                'type' => $request->type[$index],
            ]);

            $product = Product::findOrFail($productId);
            if ($product) {
                $product->stock += ($request->type[$index] === 'increase')
                    ? $request->quantity[$index]
                    : -$request->quantity[$index];
                $product->save();
            }
        }

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment created successfully.');
    }

    public function show(StockAdjustment $stockAdjustment)
    {
        $stockAdjustment->load('items.product');
        return view('stock_adjustments.show', compact('stockAdjustment'));
    }

    public function edit(StockAdjustment $stockAdjustment)
    {

        $stockAdjustment->load('items');
        $products = Product::all();
        return view('stock_adjustments.edit', compact('stockAdjustment', 'products'));

    }
    public function update(Request $request, StockAdjustment $stockAdjustment)
    {
        $request->validate([
            'reference' => 'required|unique:stock_adjustments,reference,' . $stockAdjustment->id,
            'date' => 'required|date',
            'product_id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|numeric|min:1',
            'type.*' => 'required|in:increase,decrease',
        ]);

        foreach ($stockAdjustment->items as $item) {
            $product = Product::findOrFail($item->product_id); // Ensures the product exists
            if ($product) {
                $product->stock += ($item->type === 'increase') ? -$item->quantity : $item->quantity;
                $product->save();
            }
        }

        $stockAdjustment->items()->delete();

        $stockAdjustment->update([
            'reference' => $request->reference,
            'date' => $request->date,
            'note' => $request->note ?? null,
        ]);

        foreach ($request->product_id as $index => $productId) {
            StockAdjustmentItem::create([
                'adjustment_id' => $stockAdjustment->id,
                'product_id' => $productId,
                'stock' => $request->stock[$index] ?? 0,
                'code' => $request->code[$index] ?? null,
                'quantity' => $request->quantity[$index],
                'type' => $request->type[$index],
            ]);

            $product = Product::findOrFail($productId); // Ensures the product exists
            if ($product) {
                $product->stock += ($request->type[$index] === 'increase')
                    ? $request->quantity[$index]
                    : -$request->quantity[$index];
                $product->save();
            }
        }

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment updated successfully.');
    }

    public function destroy(StockAdjustment $stockAdjustment)
    {
        foreach ($stockAdjustment->items as $item) {
            $product = Product::findOrFail($item->product_id); // Ensures the product exists
            if ($product) {
                $product->stock += ($item->type === 'increase') ? -$item->quantity : $item->quantity;
                $product->save();
            }
        }

        $stockAdjustment->items()->delete();
        $stockAdjustment->delete();

        return redirect()->route('stock-adjustments.index')->with('success', 'Stock Adjustment deleted successfully.');
    }
}

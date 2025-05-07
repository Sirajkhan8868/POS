<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'unit'])->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('products.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:100|unique:products,product_code',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'cost' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'alert_quantity' => 'nullable|integer|min:0',
            'tax' => 'nullable|numeric|min:0',
            'tax_type' => 'nullable|string|max:50',
            'note' => 'nullable|string',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('products.edit', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:100|unique:products,product_code,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'cost' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'alert_quantity' => 'nullable|integer|min:0',
            'tax' => 'nullable|numeric|min:0',
            'tax_type' => 'nullable|string|max:50',
            'note' => 'nullable|string',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catagory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['catagory', 'unit'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $catagories = Catagory::all();
        $units = Unit::all();
        return view('products.create', compact('catagories', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
            'catagory_id' => 'required',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'unit_id' => 'required',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $catagories = Catagory::all();
        $units = Unit::all();
        return view('products.edit', compact('product', 'catagories', 'units'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'catagory_id' => 'required',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'unit_id' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

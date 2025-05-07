<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_code' => 'required|unique:categories',
            'category_name' => 'required|unique:categories',
        ]);

        // Create the category, and product_count will be handled automatically.
        Category::create($request->only(['category_code', 'category_name']));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_code' => 'required|unique:categories,category_code,' . $category->id,
            'category_name' => 'required|unique:categories,category_name,' . $category->id,
        ]);

        // Update the category and product_count will be handled automatically.
        $category->update($request->only(['category_code', 'category_name']));

        // Update product count manually if needed
        $category->updateProductCount();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Category cannot be deleted because it has associated products.');
        }

        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Failed to delete category. ' . $e->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }
}

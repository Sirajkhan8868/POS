@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
        @csrf
        @if(isset($product)) @method('PUT') @endif

        <div class="container pb-4">
            <button type="submit" class="btn btn-danger mb-3">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>

            <div class="p-4 bg-white rounded-4 shadow-sm">
                <div class="row">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name ?? '') }}" required>
                        @error('product_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="text" name="product_code" class="form-control" value="{{ old('product_code', $product->product_code ?? '') }}" required>
                        @error('product_code') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="unit_id" class="form-label">Unit</label>
                        <select name="unit_id" class="form-select" required>
                            <option value="">-- Select Unit --</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id', $product->unit_id ?? '') == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" name="cost" step="0.01" class="form-control" value="{{ old('cost', $product->cost ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="alert_quantity" class="form-label">Alert Quantity</label>
                        <input type="number" name="alert_quantity" class="form-control" value="{{ old('alert_quantity', $product->alert_quantity ?? 0) }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="tax" class="form-label">Tax (%)</label>
                        <input type="number" name="tax" step="0.01" class="form-control" value="{{ old('tax', $product->tax ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tax_type" class="form-label">Tax Type</label>
                        <select name="tax_type" class="form-select">
                            <option value="" class="color:grey">Tax Type</option>
                            <option value="inclusive" {{ old('tax_type', $product->tax_type ?? '') == 'inclusive' ? 'selected' : '' }}>Inclusive</option>
                            <option value="exclusive" {{ old('tax_type', $product->tax_type ?? '') == 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea name="note" class="form-control">{{ old('note', $product->note ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

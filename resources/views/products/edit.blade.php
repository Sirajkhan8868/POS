@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')



        <div class="container">
            <button type="submit" class="btn btn-primary">Update Product</button>

            <div class=" p-4 mt-4 mb-4" style="background-color: white; border-radius: 40px">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_code">Product Code:</label>
                        <input type="text" name="product_code" class="form-control" value="{{ old('product_code', $product->product_code) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="unit_id">Unit:</label>
                        <select name="unit_id" class="form-control">
                            <option value="">-- Select Unit --</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id', $product->unit_id) == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cost">Cost:</label>
                        <input type="number" name="cost" step="0.01" class="form-control" value="{{ old('cost', $product->cost) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alert_quantity">Alert Quantity:</label>
                        <input type="number" name="alert_quantity" class="form-control" value="{{ old('alert_quantity', $product->alert_quantity) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tax">Tax (%):</label>
                        <input type="number" name="tax" step="0.01" class="form-control" value="{{ old('tax', $product->tax) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="tax_type" class="form-label">Tax Type</label>
                    <select name="tax_type" class="form-select">
                        <option value="">Select Tax Type</option>
                        <option value="inclusive" {{ old('tax_type', $product->tax_type ?? '') == 'inclusive' ? 'selected' : '' }}>Inclusive</option>
                        <option value="exclusive" {{ old('tax_type', $product->tax_type ?? '') == 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea name="note" class="form-control">{{ old('note', $product->note) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </form>
@endsection

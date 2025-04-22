@extends('layouts.app')

@section('content')

    <div class="container mt-1">
        <h1 class="mb-4">Product Details</h1>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Product List</a>

        <div class="card">
            <div class="card-header">
                <h4>{{ $product->product_name }}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
                        <p><strong>Category:</strong> {{ $product->category->category_name ?? 'N/A' }}</p>
                        <p><strong>Unit:</strong> {{ $product->unit->name ?? 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Cost:</strong> {{ $product->cost }}</p>
                        <p><strong>Price:</strong> {{ $product->price }}</p>
                        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        <p><strong>Alert Quantity:</strong> {{ $product->alert_quantity }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Tax (%):</strong> {{ $product->tax }}</p>
                        <p><strong>Tax Type:</strong> {{ $product->tax_type }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Note:</strong></p>
                        <p>{{ $product->note ?? 'No notes available' }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit Product
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" class="float-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash-alt"></i> Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back to Product List</a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $product->product_name }}</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p><strong>Product Code:</strong> <span class="text-muted">{{ $product->product_code }}</span></p>
                    <p><strong>Category:</strong> <span class="text-muted">{{ $product->category->category_name ?? 'N/A' }}</span></p>
                    <p><strong>Unit:</strong> <span class="text-muted">{{ $product->unit->name ?? 'N/A' }}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p><strong>Cost:</strong> <span class="text-muted">{{ $product->cost }}</span></p>
                    <p><strong>Price:</strong> <span class="text-muted">{{ $product->price }}</span></p>
                    <p><strong>Quantity:</strong> <span class="text-muted">{{ $product->quantity }}</span></p>
                    <p><strong>Alert Quantity:</strong> <span class="text-muted">{{ $product->alert_quantity }}</span></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <p><strong>Tax (%):</strong> <span class="text-muted">{{ $product->tax }}</span></p>
                    <p><strong>Tax Type:</strong> <span class="text-muted">{{ $product->tax_type }}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p><strong>Note:</strong></p>
                    <p class="text-muted">{{ $product->note ?? 'No notes available' }}</p>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light d-flex ">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm m-2">
                <i class="fas fa-edit"></i> Edit Product
            </a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm m-2" onclick="return confirm('Are you sure you want to delete this product?')">
                    <i class="fas fa-trash-alt"></i> Delete Product
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

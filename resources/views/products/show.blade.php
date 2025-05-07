@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('products.index') }}" class="btn btn-outline-primary mb-4">
        <i class="fas fa-arrow-left"></i> Back to Products
    </a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">
                        <i class="fas fa-box-open me-2"></i> Product Details
                    </h5>
                </div>
                <div class="card-body bg-light">
                    <div class="mb-4 text-center">
                        <h4 class="fw-bold">{{ $product->product_name }}</h4>
                        <span class="badge bg-secondary">{{ $product->product_code }}</span>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Category:</strong>
                            <div>{{ $product->category->category_name ?? 'N/A' }}</div>
                        </div>
                        <div class="col-md-6">
                            <strong>Tax Type:</strong>
                            <div>{{ $product->tax_type ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Cost:</strong>
                            <div>Rs. {{ number_format($product->cost, 2) ?? 'N/A' }}</div>
                        </div>
                        <div class="col-md-6">
                            <strong>Price:</strong>
                            <div>Rs. {{ number_format($product->price, 2) }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Quantity:</strong>
                            <div>{{ $product->quantity }}</div>
                        </div>
                        <div class="col-md-6">
                            <strong>Unit:</strong>
                            <div>{{ $product->unit->name ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <strong>Note:</strong>
                        <div class="text-muted">{{ $product->note ?? 'No additional notes.' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Category Details</h4>
        </div>
        <div class="card-body">
            <div class="row text-center mb-4">
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <h6 class="text-muted">Category Code</h6>
                        <p class="fs-5 fw-semibold mb-0">{{ $category->category_code }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <h6 class="text-muted">Category Name</h6>
                        <p class="fs-5 fw-semibold mb-0">{{ $category->category_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <h6 class="text-muted">Product Count</h6>
                        <p class="fs-5 fw-semibold mb-0">{{ $category->product_count }}</p>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                    ← Back to Categories
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

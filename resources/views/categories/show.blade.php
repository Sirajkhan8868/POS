
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Category Details: {{ $category->category_name }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Category Code:</strong>
                    <p>{{ $category->category_code }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Category Name:</strong>
                    <p>{{ $category->category_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Product Count:</strong>
                    <p>{{ $category->product_count }}</p>
                </div>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>
</div>
@endsection

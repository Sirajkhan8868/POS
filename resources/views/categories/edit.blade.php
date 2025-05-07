@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-primary mt-3 mb-4">Update Category</button>

        <div class="card shadow-sm bg-white border p-4 rounded">
            <div class="form-group mb-3">
                <label for="category_code" class="mb-2">Category Code</label>
                <input type="text" name="category_code" id="category_code" class="form-control bg-light border" value="{{ old('category_code', $category->category_code) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="category_name" class="mb-2">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control bg-light border" value="{{ old('category_name', $category->category_name) }}" required>
            </div>

        </div>
    </form>
</div>
@endsection

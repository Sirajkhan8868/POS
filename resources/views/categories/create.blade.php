@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger mt-3 mb-4">Create Category</button>


        <div class="card shadow-sm bg-white">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="category_code">Category Code</label>
                    <input type="text" name="category_code" id="category_code" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>
            </div>
        </div>



    </form>
</div>
@endsection

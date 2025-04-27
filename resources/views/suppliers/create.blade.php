@extends('layouts.app')

@section('content')
<div class="container">


    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="border p-3 rounded bg-white" style="border-radius: 30px">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('suppliers.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-right me-1"></i> Create Supplier
                </a>
            </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="supplier_name" class="form-label">Name</label>
                <input type="text" name="supplier_name" class="form-control" id="supplier_name" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="col-md-6">
                <label for="details" class="form-label">Details</label>
                <input type="text" name="details" class="form-control" id="details">
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

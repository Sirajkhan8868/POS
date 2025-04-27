@extends('layouts.app')

@section('content')
<div class="container">


    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="border p-3 rounded bg-white" style="border-radius: 30px">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('suppliers.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left me-1"></i> Back to Supplier List
            </a>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="supplier_name" class="form-label">Supplier Name</label>
                <input type="text" name="supplier_name" class="form-control" id="supplier_name" value="{{ $supplier->supplier_name }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $supplier->email }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $supplier->phone }}" required>
            </div>
            <div class="col-md-6">
                <label for="details" class="form-label">Details</label>
                <input type="text" name="details" class="form-control" id="details" value="{{ $supplier->details }}">
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Update Supplier</button>
    </div>
    </form>
</div>
@endsection

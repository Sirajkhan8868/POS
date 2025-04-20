@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>

    <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="supplier_name" class="form-control" value="{{ $supplier->supplier_name }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}" required>
        </div>

        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Customer</h2>

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection

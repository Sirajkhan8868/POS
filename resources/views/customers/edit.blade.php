@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Customer</h2>

    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $customer->customer_name }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" required>
        </div>

        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection

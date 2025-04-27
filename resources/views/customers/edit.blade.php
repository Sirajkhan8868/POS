@extends('layouts.app')

@section('content')
<div class="container mt-4">


    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="border p-3 rounded bg-white" style="border-radius: 30px">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('customers.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-right me-1"></i> All Customers
                </a>
            </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="customer_name" class="form-label">Name</label>
                <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ $customer->customer_name }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $customer->email }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="phone1" class="form-label">Phone </label>
                <input type="text" name="phone1" class="form-control" id="phone1" value="{{ $customer->phone1 }}" required>
            </div>
            <div class="col-md-4">
                <label for="phone2" class="form-label">City</label>
                <input type="text" name="phone2" class="form-control" id="phone2" value="{{ $customer->phone2 }}">
            </div>
            <div class="col-md-4">
                <label for="phone3" class="form-label">Country</label>
                <input type="text" name="phone3" class="form-control" id="phone3" value="{{ $customer->phone3 }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="details" class="form-label">Address</label>
                <input type="text" name="details" class="form-control" id="details" value="{{ $customer->details }}">
            </div>
        </div>
    </div>

    </form>
</div>
@endsection

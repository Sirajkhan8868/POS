@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Sale Return</h2>

    <form method="POST" action="{{ route('sale_returns.store') }}">
        @csrf

        <div class="form-group">
            <label>Reference</label>
            <input type="text" name="reference" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Customer</label>
            <input type="text" name="customer" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tax</label>
            <input type="number" name="tax" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>Discount</label>
            <input type="number" name="discount" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>Shipping</label>
            <input type="number" name="shipping" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>Total Amount</label>
            <input type="number" name="total_amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection

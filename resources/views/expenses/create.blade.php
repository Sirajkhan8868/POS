@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Expense</h2>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Reference</label>
            <input type="text" name="reference" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Details</label>
            <textarea name="details" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection

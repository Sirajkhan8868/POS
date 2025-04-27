@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="border p-4 bg-white" style="border-radius: 20px">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back to Expenses</a>
                <button type="submit" class="btn btn-success">Update Expense</button>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Reference</label>
                    <input type="text" name="reference" value="{{ old('reference', $expense->reference) }}" class="form-control" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="date">Date</label>
                    <input type="text" name="date" value="{{ old('date', $expense->date) }}" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Category</label>
                    <input type="text" name="category" value="{{ old('category', $expense->category) }}" class="form-control" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Amount</label>
                    <input type="number" name="amount" value="{{ old('amount', $expense->amount) }}" class="form-control" step="0.01" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label>Details</label>
                    <textarea name="details" class="form-control" rows="4" required>{{ old('details', $expense->details) }}</textarea>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

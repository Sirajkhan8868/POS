@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="border p-4 bg-white" style="border-radius: 20px">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back to Expenses</a>
        </div>

        <h4>Expense Details</h4>

        <div class="row mt-3">
            <div class="col-md-6 col-12">
                <strong>Reference:</strong>
                <p>{{ $expense->reference }}</p>
            </div>
            <div class="col-md-6 col-12">
                <strong>Date:</strong>
                <p>{{ $expense->date }}</p>
            </div>
            <div class="col-md-6 col-12">
                <strong>Category:</strong>
                <p>{{ $expense->category }}</p>
            </div>
            <div class="col-md-6 col-12">
                <strong>Amount:</strong>
                <p>${{ number_format($expense->amount, 2) }}</p>
            </div>
            <div class="col-12">
                <strong>Details:</strong>
                <p>{{ $expense->details }}</p>
            </div>
        </div>

    </div>
</div>
@endsection

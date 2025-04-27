@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf


        <div class="border p-4 bg-white" style="border-radius: 20px">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('expenses.index') }}" class="btn btn-danger">Create Expenses</a>
            </div>


        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label>Reference</label>
                <input type="text" name="reference" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-12">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control" step="0.01" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label>Details</label>
                <textarea name="details" class="form-control" rows="4" required></textarea>
            </div>
        </div>
        </div>
    </form>
</div>
@endsection

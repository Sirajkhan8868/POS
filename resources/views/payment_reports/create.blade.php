@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <form action="{{ route('payment_reports.store') }}" method="POST">
        @csrf

        <div class="border p-4 bg-white" style="border-radius: 30px;">

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="payment">Payment Amount</label>
                    <input type="number" name="payment" class="form-control" step="0.01" placeholder="Enter Payment Amount" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="payment_method">Payment Method</label>
                    <input type="text" name="payment_method" class="form-control" placeholder="Enter Payment Method" required>
                </div>
            </div>

            <button type="submit" class="btn btn-danger mt-3">
                <i class="fas fa-filter me-2"></i> Filter Report
            </button>

        </div>

    </form>
</div>
@endsection

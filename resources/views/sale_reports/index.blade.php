@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form method="GET" action="{{ route('sale-reports.index') }}">
        <div class="row mb-4">
            <div class="border p-3 rounded bg-white" style="border-radius: 30px">

            <div class="row">
                <div class="col">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col">
                    <label>Customer</label>
                    <select name="customer_id" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
            <div class="col">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col">
                <label>Payment Status</label>
                <select name="payment_status" class="form-control">
                    <option value="">Select Payment Status</option>
                    <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                    <option value="partial" {{ request('payment_status') == 'partial' ? 'selected' : '' }}>Partial</option>
                    <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                </select>
            </div>
            </div>
            <button type="submit" class="btn btn-danger mt-3">
                <i class="fas fa-filter me-2"></i> Filter Report
            </button>

        </div>
    </div>
    </form>

    <hr>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Reference</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr>
                        <td>{{ $report->date }}</td>
                        <td>{{ $report->reference }}</td>
                        <td>{{ $report->customer->name ?? 'N/A' }}</td>
                        <td>{{ ucfirst($report->status) }}</td>
                        <td>{{ number_format($report->total, 2) }}</td>
                        <td>{{ number_format($report->paid, 2) }}</td>
                        <td>{{ number_format($report->due, 2) }}</td>
                        <td>{{ ucfirst($report->payment_status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-danger">No Sales Data Available!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('purchase-reports.index') }}">
        <div class="border p-3 rounded bg-white" style="border-radius: 20px">
        <div class="row mb-3">
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
                <label>Supplier</label>
                <select name="supplier_id" class="form-control">
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <div class="col">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="received" {{ request('status') == 'received' ? 'selected' : '' }}>Received</option>
                    <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Returned</option>
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
        </button>    </div>
    </form>

    <hr>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Date</th>
                <th>Reference</th>
                <th>Supplier</th>
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
                    <td>{{ $report->supplier->name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($report->status) }}</td>
                    <td>{{ $report->total }}</td>
                    <td>{{ $report->paid }}</td>
                    <td>{{ $report->due }}</td>
                    <td>{{ ucfirst($report->payment_status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-danger">No Purchases Data Available!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

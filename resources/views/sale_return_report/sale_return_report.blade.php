
@extends('layouts.app')

@section('title', 'Sale Return Report')

@section('content')
    <div class="container">
        <h2>Sale Return Report</h2>

        <form method="GET" action="{{ route('sale_return_report') }}">
            <div class="row">
                <div class="col-md-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="">All Customers</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Filter</button>
        </form>

        <hr>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($saleReturnReports as $report)
                    <tr>
                        <td>{{ $report->start_date }}</td>
                        <td>{{ $report->end_date }}</td>
                        <td>{{ $report->customer ? $report->customer->name : 'N/A' }}</td>
                        <td>{{ ucfirst($report->status) }}</td>
                        <td>{{ ucfirst($report->payment_status) }}</td>
                        <td>
                            <a href="{{ route('sale_return_report.show', $report->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Sale Return Reports Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $saleReturnReports->links() }}
    </div>
@endsection

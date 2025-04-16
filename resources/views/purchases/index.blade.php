@extends('layouts.app')

@section('content')
    <h1>All Purchases</h1>

    <a href="{{ route('purchases.create') }}" class="btn btn-primary">+ Create New Purchase</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->reference }}</td>
                    <td>{{ $purchase->customer->name }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ number_format($purchase->total_amount, 2) }}</td>
                    <td>{{ $purchase->status }}</td>
                    <td>
                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

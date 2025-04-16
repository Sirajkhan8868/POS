@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">All Quotations</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('quotations.create') }}" class="btn btn-primary mb-3">+ Create New Quotation</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Reference</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotations as $quotation)
                    <tr>
                        <td>{{ $quotation->reference }}</td>
                        <td>{{ $quotation->customer }}</td>
                        <td>{{ $quotation->date }}</td>
                        <td>${{ $quotation->total_amount }}</td>
                        <td>{{ $quotation->status }}</td>
                        <td>
                            <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-sm btn-info">View</a>
                            <form action="{{ route('quotations.destroy', $quotation->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this quotation?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($quotations->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No quotations found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

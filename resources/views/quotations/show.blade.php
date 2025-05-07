@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Quotation Detail</h2>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Reference:</strong> {{ $quotation->reference }}</li>
        <li class="list-group-item"><strong>Customer:</strong> {{ $quotation->customer->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $quotation->status }}</li>
        <li class="list-group-item"><strong>Total:</strong> PKR {{ number_format($quotation->total_amount, 2) }}</li>
    </ul>

    <h5 class="mb-3">Products</h5>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Tax (%)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>PKR {{ number_format($item->net_unit_price, 2) }}</td>
                    <td>{{ $item->tax }}%</td>
                    <td>PKR {{ number_format($item->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('quotations.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Quotations
        </a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sale Details</h2>

    <div class="mb-4">
        <strong>Reference:</strong> {{ $sale->reference }}<br>
        <strong>Customer:</strong> {{ $sale->customer->name ?? '' }}<br>
        <strong>Date:</strong> {{ $sale->date }}<br>
        <strong>Status:</strong> {{ $sale->status }}<br>
        <strong>Total:</strong> PKR {{ number_format($sale->total_amount, 2) }}
    </div>

    <h4>Products</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale->items as $item)
            <tr>
                <td>{{ $item->product->product_name ?? 'N/A' }}</td>
                <td>PKR {{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>PKR {{ number_format($item->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('sales.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection

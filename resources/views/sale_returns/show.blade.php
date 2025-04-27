@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            Sale Return Details ({{ $sale_return->reference }})
        </div>
        <div class="card-body">
            <p><strong>Supplier ID:</strong> {{ $sale_return->customer_id }}</p>
            <p><strong>Date:</strong> {{ $sale_return->date }}</p>
            <p><strong>Status:</strong> {{ $sale_return->status }}</p>
            <p><strong>Payment Method:</strong> {{ $sale_return->payment_method }}</p>
            <p><strong>Amount Refunded:</strong> PKR {{ number_format($sale_return->amount_paid, 2) }}</p>
            <p><strong>Note:</strong> {{ $sale_return->note }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Returned Products
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale_return->items as $item)
                    <tr>
                        <td>{{ $item->product->product_name }}</td>
                        <td>PKR {{ number_format($item->unit_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>PKR {{ number_format($item->discount, 2) }}</td>
                        <td>PKR {{ number_format($item->tax, 2) }}</td>
                        <td>PKR {{ number_format($item->sub_total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <p><strong>Total Amount:</strong> PKR {{ number_format($sale_return->total_amount, 2) }}</p>
        <p><strong>Tax:</strong> {{ $sale_return->tax }}%</p>
        <p><strong>Discount:</strong> {{ $sale_return->discount }}%</p>
        <p><strong>Shipping:</strong> PKR {{ number_format($sale_return->shipping, 2) }}</p>
    </div>

    <a href="{{ route('sale_returns.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Purchase Details - {{ $purchase->reference }}</h1>

    <div class="mb-3">
        <strong>Customer:</strong> {{ $purchase->customer->name }} <br>
        <strong>Date:</strong> {{ $purchase->date }} <br>
        <strong>Status:</strong> {{ $purchase->status }} <br>
        <strong>Total Amount:</strong> {{ number_format($purchase->total_amount, 2) }} <br>
    </div>

    <h3>Items</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Net Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->net_unit_price, 2) }}</td>
                    <td>{{ number_format($item->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Back to Purchases</a>
@endsection

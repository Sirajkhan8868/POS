@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Quotation Detail</h2>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Reference:</strong> {{ $quotation->reference }}</li>
            <li class="list-group-item"><strong>Customer:</strong> {{ $quotation->customer }}</li>
            <li class="list-group-item"><strong>Date:</strong> {{ $quotation->date }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $quotation->status }}</li>
            <li class="list-group-item"><strong>Total:</strong> ${{ $quotation->total_amount }}</li>
        </ul>

        <h5>Items</h5>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotation->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->net_unit_price }}</td>
                        <td>${{ $item->subtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

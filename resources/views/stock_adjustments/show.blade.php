@extends('layouts.app')

@section('content')
    <h1>Adjustment Details</h1>

    <p><strong>Reference:</strong> {{ $stockAdjustment->reference }}</p>
    <p><strong>Date:</strong> {{ $stockAdjustment->date }}</p>
    <p><strong>Note:</strong> {{ $stockAdjustment->note }}</p>

    <h5>Items</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Code</th>
                <th>Stock</th>
                <th>Qty</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stockAdjustment->items as $item)
                <tr>
                    <td>{{ $item->product->product_name ?? 'N/A' }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ ucfirst($item->type) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

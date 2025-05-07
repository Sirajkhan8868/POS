@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Adjustment: {{ $stockAdjustment->reference }}</h4>
    <p>Date: {{ $stockAdjustment->date }}</p>
    <p>Note: {{ $stockAdjustment->note ?? 'N/A' }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Code</th>
                <th>Stock</th>
                <th>Quantity</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockAdjustment->items as $item)
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
</div>
@endsection

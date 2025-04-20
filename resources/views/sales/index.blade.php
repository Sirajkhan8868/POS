@extends('layouts.app')

@section('content')
<table>
    <thead>
        <tr>
            <th>Reference</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->reference }}</td>
                <td>{{ $sale->customer }}</td>
                <td>{{ $sale->status }}</td>
                <td>PKR{{ number_format($sale->total_amount, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

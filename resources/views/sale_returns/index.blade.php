@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sale Returns</h2>
    <a href="{{ route('sale_returns.create') }}" class="btn btn-primary">Add Return</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($returns as $return)
                <tr>
                    <td>{{ $return->reference }}</td>
                    <td>{{ $return->customer }}</td>
                    <td>{{ $return->status }}</td>
                    <td>PKR {{ number_format($return->total_amount, 2) }}</td>
                    <td>{{ $return->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

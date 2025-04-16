@extends('layouts.app')

@section('content')
    <h1>Purchase Returns</h1>

    <a href="{{ route('purchase-returns.create') }}" class="btn btn-primary">+ Create Purchase Return</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Supplier</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returns as $return)
                <tr>
                    <td>{{ $return->reference }}</td>
                    <td>{{ $return->supplier }}</td>
                    <td>{{ $return->date }}</td>
                    <td>{{ $return->total_amount }}</td>
                    <td>{{ $return->status }}</td>
                    <td>
                        <a href="{{ route('purchasereturns.show', $return) }}" class="btn btn-info">View</a>
                        <a href="{{ route('purchasereturns.edit', $return) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('purchasereturns.destroy', $return) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profit and Losses</h1>
        <a href="{{ route('profit_losses.create') }}" class="btn btn-primary">Create Profit/Loss</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Sale</th>
                    <th>Sale Return</th>
                    <th>Purchase</th>
                    <th>Purchase Return</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profitLosses as $profitLoss)
                    <tr>
                        <td>{{ $profitLoss->sale ? $profitLoss->sale->id : 'N/A' }}</td>
                        <td>{{ $profitLoss->saleReturn ? $profitLoss->saleReturn->id : 'N/A' }}</td>
                        <td>{{ $profitLoss->purchase ? $profitLoss->purchase->id : 'N/A' }}</td>
                        <td>{{ $profitLoss->purchaseReturn ? $profitLoss->purchaseReturn->id : 'N/A' }}</td>
                        <td>{{ $profitLoss->start_date }}</td>
                        <td>{{ $profitLoss->end_date }}</td>
                        <td>
                            <a href="{{ route('profit_losses.show', $profitLoss) }}" class="btn btn-info">View</a>
                            <a href="{{ route('profit_losses.edit', $profitLoss) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('profit_losses.destroy', $profitLoss) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

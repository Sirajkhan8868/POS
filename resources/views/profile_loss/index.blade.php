@extends('layouts.app')

@section('title', 'Profit and Loss Reports')

@section('content')
    <div class="container">
        <h2>Profit and Loss Records</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sale ID</th>
                    <th>Sale Return ID</th>
                    <th>Profit ID</th>
                    <th>Purchase ID</th>
                    <th>Purchase Return ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profitLosses as $profitLoss)
                    <tr>
                        <td>{{ $profitLoss->sale_id }}</td>
                        <td>{{ $profitLoss->sale_return_id }}</td>
                        <td>{{ $profitLoss->profit_id }}</td>
                        <td>{{ $profitLoss->purchase_id }}</td>
                        <td>{{ $profitLoss->purchase_return_id }}</td>
                        <td>{{ $profitLoss->start_date }}</td>
                        <td>{{ $profitLoss->end_date }}</td>
                        <td>
                            <a href="{{ route('profit_loss.edit', $profitLoss->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('profit_loss.destroy', $profitLoss->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

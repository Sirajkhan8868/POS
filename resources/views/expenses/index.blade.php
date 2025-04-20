@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Expenses</h2>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add Expense</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->reference }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>{{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->details }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this expense?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

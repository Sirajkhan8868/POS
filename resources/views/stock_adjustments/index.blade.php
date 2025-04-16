@extends('layouts.app')

@section('content')
    <h1>Stock Adjustments</h1>
    <a href="{{ route('stock-adjustments.create') }}" class="btn btn-primary">+ Create Adjustment</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Date</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adjustments as $adjustment)
                <tr>
                    <td>{{ $adjustment->reference }}</td>
                    <td>{{ $adjustment->date }}</td>
                    <td>{{ $adjustment->note }}</td>
                    <td>
                        <a href="{{ route('stock-adjustments.show', $adjustment) }}" class="btn btn-info btn-sm">View</a>
                        <form action="{{ route('stock-adjustments.destroy', $adjustment) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

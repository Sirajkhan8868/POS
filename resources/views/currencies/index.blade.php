@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Currencies</h2>
    <a href="{{ route('currencies.create') }}" class="btn btn-primary mb-3">Add Currency</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Code</th><th>Symbol</th><th>Thousand</th><th>Decimal</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td>{{ $currency->currency_name }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>{{ $currency->thousand_operator }}</td>
                    <td>{{ $currency->decimal_operator }}</td>
                    <td>
                        <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('currencies.destroy', $currency->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this currency?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

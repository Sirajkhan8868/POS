@extends('layouts.app')

@section('content')
    <h1>Barcode List</h1>
    <a href="{{ route('barcodes.create') }}" class="btn btn-primary">+ Create New Barcode</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barcodes as $barcode)
                <tr>
                    <td>{{ $barcode->product_name }}</td>
                    <td>{{ $barcode->product_code }}</td>
                    <td>{{ $barcode->quantity }}</td>
                    <td>
                        <a href="{{ route('barcodes.edit', $barcode) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barcodes.destroy', $barcode) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')

<div class="mb-4 p-3 border rounded bg-white shadow-sm">
    <form method="GET" action="{{ route('barcodes.index') }}">
        <div class="input-group">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <input type="search" class="form-control" placeholder="Search product..." name="search" value="{{ request('search') }}">
        </div>
    </form>
</div>

<div class="text-start text-dark mt-3 p-2 mb-4 border rounded" style="background-color: rgb(71, 212, 255);">
    NOTE: Product Code must be a number to generate barcodes!
</div>

<form action="{{ route('barcodes.store') }}" method="POST">
    @csrf
    <div class="border p-3 rounded mb-4 shadow-sm bg-white">
        <table class="table bg-white table-bordered w-100">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="text-center text-danger">
                        Please search & select a product!
                    </td>
                </tr>
            </tbody>
        </table>


        <button type="submit" class="btn btn-danger mt-2">
            <i class="fas fa-barcode"></i> Generate Barcode
        </button>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif



@endsection

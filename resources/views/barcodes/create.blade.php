@extends('layouts.app')

@section('content')

<div class="mb-4 p-3 border rounded bg-white shadow-sm">
    <form>
        <div class="input-group">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <input type="search" class="form-control" placeholder="Search product..." aria-label="Search" name="search">

        </div>
    </form>
</div>


    <form action="{{ route('barcodes.store') }}" method="POST">
        @csrf

        <div class="border p-3 rounded mb-4 shadow-sm">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="product_name" placeholder="Product name" id="product_name" required>
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="product_code" placeholder="Code" id="product_code" required>
                </div>

                <div class="col-md-4 mb-3">
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" id="quantity" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-danger">
            <i class="fas fa-barcode"></i> Generate Barcode
        </button>
    </form>
@endsection

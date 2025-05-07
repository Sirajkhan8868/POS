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
<div class="text-start text-dark mt-3 p-2 mb-4 border rounded" style="background-color: rgb(71, 212, 255);">
    NOTE: Product Code must be a number to generate barcodes!
</div>


    <form action="{{ route('barcodes.store') }}" method="POST">
        @csrf
        <div class="border p-3 rounded mb-4 shadow-sm bg-white">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" id="product_name" required>
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="product_code" placeholder="Product Code" id="product_code" required>
                </div>

                <div class="col-md-4 ">
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" id="quantity" required>
                </div>
            </div>
            <div class="text-center text-danger mt-3 p-2 border rounded">
                Please search & select a product!
            </div>
            <button type="submit" class="btn btn-danger mt-2">
                <i class="fas fa-barcode"></i> Generate Barcode
            </button>
        </div>
    </form>
@endsection

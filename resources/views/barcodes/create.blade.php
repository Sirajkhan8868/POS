@extends('layouts.app')

@section('content')
    <h1>Create Barcode</h1>

    <form action="{{ route('barcodes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" required>
        </div>
        <div class="mb-3">
            <label for="product_code" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="product_code" id="product_code" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>
        <div class="mb-3">
            <label for="barcode_print" class="form-label">Barcode Print Type</label>
            <select name="barcode_print" class="form-control" id="barcode_print" required>
                <option value="barcode">Traditional Barcode</option>
                <option value="qr_code">QR Code</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Barcode</button>
    </form>
@endsection

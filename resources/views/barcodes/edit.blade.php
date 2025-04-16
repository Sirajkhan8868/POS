@extends('layouts.app')

@section('content')
    <h1>Edit Barcode</h1>

    <form action="{{ route('barcodes.update', $barcode) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $barcode->product_name }}" required>
        </div>
        <div class="mb-3">
            <label for="product_code" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="product_code" id="product_code" value="{{ $barcode->product_code }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $barcode->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="barcode_print" class="form-label">Barcode Print Type</label>
            <select name="barcode_print" class="form-control" id="barcode_print" required>
                <option value="barcode" {{ $barcode->barcode_print == 'barcode' ? 'selected' : '' }}>Traditional Barcode</option>
                <option value="qr_code" {{ $barcode->barcode_print == 'qr_code' ? 'selected' : '' }}>QR Code</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Barcode</button>
    </form>

    <h2>Preview Barcode</h2>
    @if($barcode->barcode_print == 'qr_code')
        {!! QrCode::size(200)->generate($barcode->product_code) !!}
    @else
        <div>{{ $barcode->product_code }}</div>
    @endif
@endsection

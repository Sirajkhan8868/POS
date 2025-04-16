@extends('layouts.app')

@section('content')
    <h1>Create Stock Adjustment</h1>

    <form action="{{ route('stock-adjustments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Reference</label>
            <input type="text" name="reference" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <h5>Products</h5>
        <div id="product-items">
            <div class="row mb-3">
                <div class="col">
                    <select name="product_id[]" class="form-control" required>
                        <option value="">-- Select Product --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col"><input name="stock[]" class="form-control" placeholder="Stock" required></div>
                <div class="col"><input name="code[]" class="form-control" placeholder="Code" required></div>
                <div class="col"><input name="quantity[]" type="number" class="form-control" placeholder="Qty" required></div>
                <div class="col">
                    <select name="type[]" class="form-control" required>
                        <option value="increase">Increase</option>
                        <option value="decrease">Decrease</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Save Adjustment</button>
    </form>
@endsection

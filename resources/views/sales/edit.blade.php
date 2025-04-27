@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Sale</h2>

    <form method="POST" action="{{ route('sales.update', $sale) }}">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Reference</label>
                <input type="text" name="reference" class="form-control" value="{{ $sale->reference }}" required>
            </div>

            <div class="col-md-4">
                <label>Customer</label>
                <select name="customer_id" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $sale->date }}" required>
            </div>
        </div>

        <h4>Products</h4>
        <div id="product-list">
            @foreach($sale->items as $item)
            <div class="row mb-2">
                <div class="col-md-5">
                    <select name="items[{{ $loop->index }}][product_id]" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="items[{{ $loop->index }}][price]" class="form-control" value="{{ $item->price }}" step="0.01" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="items[{{ $loop->index }}][quantity]" class="form-control" value="{{ $item->quantity }}" required>
                </div>
                <div class="col-md-3">
                    Subtotal: {{ number_format($item->subtotal, 2) }}
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Tax (%)</label>
                <input type="number" name="tax" class="form-control" value="{{ $sale->tax }}">
            </div>
            <div class="col-md-4">
                <label>Discount (%)</label>
                <input type="number" name="discount" class="form-control" value="{{ $sale->discount }}">
            </div>
            <div class="col-md-4">
                <label>Shipping (PKR)</label>
                <input type="number" name="shipping" class="form-control" value="{{ $sale->shipping }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" {{ $sale->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $sale->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $sale->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Sale</button>
    </form>
</div>
@endsection

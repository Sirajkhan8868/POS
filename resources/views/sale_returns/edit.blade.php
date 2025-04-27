@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('sale_returns.update', $sale_return->id) }}">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="reference">Reference *</label>
                <input type="text" name="reference" value="{{ $sale_return->reference }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="customer">Supplier *</label>
                <select name="customer" class="form-control" required>
                    <option value="">Select Supplier</option>
                    <option value="{{ $sale_return->customer_id }}" selected>Supplier {{ $sale_return->customer_id }}</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="date">Date *</label>
                <input type="date" name="date" value="{{ $sale_return->date }}" class="form-control" required>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Product</th>
                            <th>Unit Price (PKR)</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        @foreach($sale_return->items as $item)
                        <tr class="product-row">
                            <td>
                                <input type="hidden" name="product_id[]" value="{{ $item->product->id }}">
                                <span class="product-name">{{ $item->product->product_name }}</span>
                            </td>
                            <td><input type="number" name="unit_price[]" class="form-control unit-price" value="{{ $item->unit_price }}" step="0.01" required></td>
                            <td><span class="product-stock">{{ $item->product->stock ?? 0 }}</span></td>
                            <td><input type="number" name="quantity[]" class="form-control quantity" value="{{ $item->quantity }}" min="1" required></td>
                            <td><input type="number" name="product_discount[]" class="form-control product-discount" value="{{ $item->discount }}" step="0.01"></td>
                            <td><input type="number" name="product_tax[]" class="form-control product-tax" value="{{ $item->tax }}" step="0.01"></td>
                            <td>
                                <span class="sub-total">{{ number_format($item->sub_total, 2) }}</span>
                                <input type="hidden" name="sub_total[]" class="sub-total-input" value="{{ $item->sub_total }}">
                            </td>
                            <td><button type="button" class="btn btn-danger remove-product">X</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('sale_returns.partials.totals', [
            'tax' => $sale_return->tax,
            'discount' => $sale_return->discount,
            'shipping' => $sale_return->shipping,
            'total' => $sale_return->total_amount
        ])

        <input type="hidden" name="total_amount" id="total_amount" value="{{ $sale_return->total_amount }}">

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tax_percentage">Tax (%)</label>
                <input type="number" name="tax_percentage" id="tax_percentage" class="form-control" value="{{ $sale_return->tax }}" step="0.01">
            </div>
            <div class="col-md-4">
                <label for="discount_percentage">Discount (%)</label>
                <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ $sale_return->discount }}" step="0.01">
            </div>
            <div class="col-md-4">
                <label for="shipping">Shipping (PKR)</label>
                <input type="number" name="shipping" id="shipping" class="form-control" value="{{ $sale_return->shipping }}" step="0.01">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="status">Return Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" {{ $sale_return->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $sale_return->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $sale_return->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="payment_method">Payment Method *</label>
                <select name="payment_method" class="form-control" required>
                    <option value="Cash" {{ $sale_return->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Credit" {{ $sale_return->payment_method == 'Credit' ? 'selected' : '' }}>Credit</option>
                    <option value="Bank Transfer" {{ $sale_return->payment_method == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="Other" {{ $sale_return->payment_method == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="amount_paid">Amount Refunded *</label>
                <input type="number" name="amount_paid" value="{{ $sale_return->amount_paid }}" class="form-control" step="0.01" min="0" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="note">Note</label>
            <textarea name="note" class="form-control" rows="3">{{ $sale_return->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Sale Return</button>
    </form>
</div>
@endsection

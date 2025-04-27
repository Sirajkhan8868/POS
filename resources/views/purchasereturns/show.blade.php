@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Purchase Return - {{ $purchaseReturn->reference }}</h3>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label><strong>Reference:</strong></label>
                    <p>{{ $purchaseReturn->reference }}</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Supplier:</strong></label>
                    <p>{{ $purchaseReturn->supplier->name }}</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Return Date:</strong></label>
                    <p>{{ $purchaseReturn->date }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label><strong>Status:</strong></label>
                    <p>{{ $purchaseReturn->status }}</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Refund Method:</strong></label>
                    <p>{{ $purchaseReturn->payment_method }}</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Amount Refunded:</strong></label>
                    <p>{{ number_format($purchaseReturn->amount_paid, 2) }} PKR</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">Items in Return</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Net Unit Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseReturn->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ number_format($item->unit_price, 2) }} PKR</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->discount, 2) }} PKR</td>
                                <td>{{ number_format($item->tax, 2) }} PKR</td>
                                <td>{{ number_format($item->sub_total, 2) }} PKR</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label><strong>Tax Amount:</strong></label>
                    <p>{{ number_format($purchaseReturn->tax_amount, 2) }} PKR</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Discount Amount:</strong></label>
                    <p>{{ number_format($purchaseReturn->discount_amount, 2) }} PKR</p>
                </div>
                <div class="col-md-4">
                    <label><strong>Shipping Amount:</strong></label>
                    <p>{{ number_format($purchaseReturn->shipping_amount, 2) }} PKR</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label><strong>Grand Total:</strong></label>
                    <p>{{ number_format($purchaseReturn->grand_total, 2) }} PKR</p>
                </div>
            </div>

            <div class="mb-3">
                <label><strong>Note / Reason:</strong></label>
                <p>{{ $purchaseReturn->note }}</p>
            </div>

            <div class="form-group">
                <a href="{{ route('purchase-returns.edit', $purchaseReturn->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('purchase-returns.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm mb-4" style="border-radius: 20px;">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <h4 class="fw-bold">Quotation #{{ $quotation->reference }}</h4>
                    <p class="text-muted">Created on: {{ \Carbon\Carbon::parse($quotation->created_at)->format('d-m-Y') }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <span class="badge bg-{{ $quotation->status == 'Approved' ? 'success' : ($quotation->status == 'Rejected' ? 'danger' : 'warning') }}">
                        {{ $quotation->status }}
                    </span>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> {{ $quotation->customer->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $quotation->customer->email }}</p>
                    <p><strong>Phone:</strong> {{ $quotation->customer->phone }}</p>
                    <p><strong>Address:</strong> {{ $quotation->customer->address }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Quotation Details</h5>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($quotation->date)->format('d-m-Y') }}</p>
                    <p><strong>Reference:</strong> {{ $quotation->reference }}</p>
                    <p><strong>Status:</strong> {{ $quotation->status }}</p>
                    <p><strong>Note:</strong> {{ $quotation->note ?? 'No additional notes' }}</p>
                </div>
            </div>

            <hr>

            <h5>Products</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Net Unit Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotation->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>PKR {{ number_format($product->pivot->unit_price, 2) }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->discount }}%</td>
                        <td>{{ $product->pivot->tax }}%</td>
                        <td>PKR {{ number_format($product->pivot->sub_total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <div class="row mb-3">
                <div class="col-md-8">
                    <h5>Summary</h5>
                    <p><strong>Subtotal:</strong> PKR {{ number_format($quotation->subtotal, 2) }}</p>
                    <p><strong>Discount:</strong> PKR {{ number_format($quotation->discount_amount, 2) }}</p>
                    <p><strong>Tax:</strong> PKR {{ number_format($quotation->tax_amount, 2) }}</p>
                    <p><strong>Shipping:</strong> PKR {{ number_format($quotation->shipping, 2) }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <h5>Total Amount</h5>
                    <p><strong>Grand Total:</strong> PKR {{ number_format($quotation->total_amount, 2) }}</p>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('quotations.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Quotations List
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

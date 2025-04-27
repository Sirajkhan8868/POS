@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('quotations.update', $quotation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card mb-4 shadow-sm" style="border-radius: 20px">
            <div class="card-body p-3">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control border-start-0" placeholder="Type product name or code..." aria-label="Search" name="search">
                </div>
            </div>
        </div>

        <div class="border p-4 rounded bg-white" style="border-radius: 20px">

            <div class="mb-3">
                <input type="hidden" name="total_amount" id="total_amount" value="{{ old('total_amount', $quotation->total_amount) }}">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-check"></i> Update Quotation
                </button>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference', $quotation->reference) }}" required>
                </div>
                <div class="col-md-4">
                    <label for="customer" class="form-label">Customer <span class="text-danger">*</span></label>
                    <select name="customer_id" id="customer" class="form-control" required>
                        <option value="">-- Select Customer --</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $quotation->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $quotation->date) }}" required>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead class="bg-secondary  text-white">
                            <tr>
                                <th style="font-weight: medium;">Product</th>
                                <th style="font-weight: medium;">Net Unit Price</th>
                                <th style="font-weight: medium;">Stock</th>
                                <th style="font-weight: medium;">Quantity</th>
                                <th style="font-weight: medium;">Discount</th>
                                <th style="font-weight: medium;">Tax</th>
                                <th style="font-weight: medium;">Sub Total</th>
                                <th style="font-weight: medium;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            @foreach($quotation->products as $product)
                                <tr class="product-row">
                                    <td>
                                        <input type="hidden" name="product_id[]" class="product-id" value="{{ $product->id }}">
                                        <span class="product-name">{{ $product->name }}</span>
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[]" class="form-control unit-price" step="0.01" min="0" value="{{ $product->pivot->unit_price }}" required>
                                    </td>
                                    <td>
                                        <span class="product-stock">{{ $product->stock }}</span>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control quantity" min="1" value="{{ $product->pivot->quantity }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="product_discount[]" class="form-control product-discount" min="0" value="{{ $product->pivot->discount }}" step="0.01">
                                    </td>
                                    <td>
                                        <input type="number" name="product_tax[]" class="form-control product-tax" min="0" value="{{ $product->pivot->tax }}" step="0.01">
                                    </td>
                                    <td>
                                        <span class="sub-total">{{ $product->pivot->sub_total }}</span>
                                        <input type="hidden" name="sub_total[]" class="sub-total-input" value="{{ $product->pivot->sub_total }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger remove-product">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-6 text-start fw-bold">Tax ({{ old('tax_percentage', $quotation->tax_percentage) }}%)</div>
                                <div class="col-6 text-end">(+) PKR<span id="tax-amount">{{ old('tax_amount', $quotation->tax_amount) }}</span></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 text-start fw-bold">Discount ({{ old('discount_percentage', $quotation->discount_percentage) }}%)</div>
                                <div class="col-6 text-end">(-) PKR<span id="discount-amount">{{ old('discount_amount', $quotation->discount_amount) }}</span></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 text-start fw-bold">Shipping</div>
                                <div class="col-6 text-end">(+) PKR<span id="shipping-amount">{{ old('shipping', $quotation->shipping) }}</span></div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-6 text-start fw-normal fw-bold">Grand Total</div>
                                <div class="col-6 text-end fw-bold">(=) PKR<span id="grand-total">{{ old('total_amount', $quotation->total_amount) }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="tax_percentage" class="form-label">Tax (%)</label>
                    <input type="number" class="form-control" name="tax_percentage" id="tax_percentage" min="0" step="0.01" value="{{ old('tax_percentage', $quotation->tax_percentage) }}">
                </div>
                <div class="col-md-4">
                    <label for="discount_percentage" class="form-label">Discount (%)</label>
                    <input type="number" class="form-control" name="discount_percentage" id="discount_percentage" min="0" step="0.01" value="{{ old('discount_percentage', $quotation->discount_percentage) }}">
                </div>
                <div class="col-md-4">
                    <label for="shipping" class="form-label">Shipping</label>
                    <input type="number" class="form-control" name="shipping" id="shipping" min="0" step="0.01" value="{{ old('shipping', $quotation->shipping) }}">
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Pending" {{ $quotation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $quotation->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $quotation->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note (If Needed)</label>
                <textarea name="note" id="note" class="form-control" rows="4">{{ old('note', $quotation->note) }}</textarea>
            </div>


        </div>
    </form>

</div>

<template id="product-row-template">
    <tr class="product-row">
        <td>
            <input type="hidden" name="product_id[]" class="product-id">
            <span class="product-name"></span>
        </td>
        <td>
            <input type="number" name="unit_price[]" class="form-control unit-price" step="0.01" min="0" required>
        </td>
        <td>
            <span class="product-stock"></span>
        </td>
        <td>
            <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" required>
        </td>
        <td>
            <input type="number" name="product_discount[]" class="form-control product-discount" min="0" value="0" step="0.01">
        </td>
        <td>
            <input type="number" name="product_tax[]" class="form-control product-tax" min="0" value="0" step="0.01">
        </td>
        <td>
            <span class="sub-total">0.00</span>
            <input type="hidden" name="sub_total[]" class="sub-total-input">
        </td>
        <td>
            <button type="button" class="btn btn-sm btn-danger remove-product">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</template>

@push('scripts')
<script>
</script>
@endpush

@endsection

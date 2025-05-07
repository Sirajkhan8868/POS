@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('quotations.update', $quotation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="text-start mb-2">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Update Quotation
            </button>
        </div>

        <div class="border p-4 bg-white rounded">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference"
                           value="{{ old('reference', $quotation->reference) }}" required>
                </div>

                <div class="col-md-4">
                    <label>Customer <span class="text-danger">*</span></label>
                    <select class="form-control" name="customer_id" required>
                        <option value="">-- Select Customer --</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $quotation->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="date"
                           value="{{ old('date', \Carbon\Carbon::parse($quotation->date)->format('Y-m-d')) }}" required>
                </div>
            </div>

            <hr>

            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quotation->items as $item)
                            <tr>
                                <td>
                                    {{ $item->product_name }}
                                    <input type="hidden" name="product_id[]" value="{{ $item->product_id }}">
                                </td>
                                <td>
                                    <input type="number" name="unit_price[]" class="form-control"
                                    value="{{ old('unit_price', $item->net_unit_price) }}" step="0.01" required>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control"
                                           value="{{ old('quantity', $item->quantity) }}" min="1" required>
                                </td>
                                <td>
                                    <input type="number" name="product_discount[]" class="form-control"
                                           value="{{ old('product_discount', $item->discount) }}" step="0.01">
                                </td>
                                <td>
                                    <input type="number" name="product_tax[]" class="form-control"
                                           value="{{ old('product_tax', $item->tax) }}" step="0.01">
                                </td>
                                <td>
                                    {{ number_format($item->subtotal, 2) }}
                                    <input type="hidden" name="sub_total[]" value="{{ $item->subtotal }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Tax %</label>
                    <input type="number" class="form-control" name="tax" value="{{ old('tax', $quotation->tax) }}">
                </div>
                <div class="col-md-4">
                    <label>Discount %</label>
                    <input type="number" class="form-control" name="discount" value="{{ old('discount', $quotation->discount) }}">
                </div>
                <div class="col-md-4">
                    <label>Shipping</label>
                    <input type="number" class="form-control" name="shipping" value="{{ old('shipping', $quotation->shipping) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="Pending" {{ $quotation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $quotation->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $quotation->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label>Note</label>
                    <textarea class="form-control" name="note" rows="3">{{ old('note', $quotation->note) }}</textarea>
                </div>
            </div>

            <input type="hidden" name="total_amount" value="{{ old('total_amount', $quotation->total_amount) }}">
        </div>
    </form>
</div>
@endsection

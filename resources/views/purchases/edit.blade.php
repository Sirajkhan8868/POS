@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('purchase-returns.update', $purchaseReturn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <h3>Edit Purchase Return - {{ $purchaseReturn->reference }}</h3>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="reference" class="form-label">Reference:</label>
                        <input type="text" name="reference" id="reference" class="form-control" value="{{ $purchaseReturn->reference }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="supplier" class="form-label">Supplier:</label>
                        <select name="supplier_id" id="supplier" class="form-control" required>
                            <option value="">-- Select Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $supplier->id == $purchaseReturn->supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">Return Date:</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $purchaseReturn->date }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Pending" {{ $purchaseReturn->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Processed" {{ $purchaseReturn->status == 'Processed' ? 'selected' : '' }}>Processed</option>
                            <option value="Rejected" {{ $purchaseReturn->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="payment_method" class="form-label">Refund Method:</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="Cash" {{ $purchaseReturn->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Credit" {{ $purchaseReturn->payment_method == 'Credit' ? 'selected' : '' }}>Credit</option>
                            <option value="Bank Transfer" {{ $purchaseReturn->payment_method == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="Other" {{ $purchaseReturn->payment_method == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="amount_paid" class="form-label">Amount Refunded:</label>
                        <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="{{ $purchaseReturn->amount_paid }}" step="0.01" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="note" class="form-label">Reason / Note (optional):</label>
                        <textarea name="note" id="note" class="form-control" rows="4">{{ $purchaseReturn->note }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="products" class="form-label">Products:</label>
                        <table class="table table-bordered" id="product-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                @foreach($purchaseReturn->products as $product)
                                    <tr class="product-row">
                                        <td>{{ $product->name }}</td>
                                        <td><input type="number" name="quantity[]" value="{{ $product->pivot->quantity }}" class="form-control quantity"></td>
                                        <td><input type="number" name="unit_price[]" value="{{ $product->pivot->unit_price }}" class="form-control unit-price" step="0.01"></td>
                                        <td><input type="number" name="product_discount[]" value="{{ $product->pivot->discount }}" class="form-control product-discount" step="0.01"></td>
                                        <td><input type="number" name="product_tax[]" value="{{ $product->pivot->tax }}" class="form-control product-tax" step="0.01"></td>
                                        <td><span class="sub-total">{{ number_format($product->pivot->sub_total, 2) }}</span></td>
                                        <td><button type="button" class="btn btn-danger remove-product">Remove</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Purchase Return</button>
                    <a href="{{ route('purchase-returns.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productRows = document.querySelectorAll('.product-row');
        const quantityInputs = document.querySelectorAll('.quantity');
        const unitPriceInputs = document.querySelectorAll('.unit-price');
        const discountInputs = document.querySelectorAll('.product-discount');
        const taxInputs = document.querySelectorAll('.product-tax');
        const subTotalElements = document.querySelectorAll('.sub-total');

        function calculateRowTotal(row) {
            const quantity = parseInt(row.querySelector('.quantity').value) || 0;
            const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
            const discount = parseFloat(row.querySelector('.product-discount').value) || 0;
            const tax = parseFloat(row.querySelector('.product-tax').value) || 0;

            const subtotal = (unitPrice * quantity) - discount + tax;
            row.querySelector('.sub-total').textContent = subtotal.toFixed(2);
        }

        quantityInputs.forEach(input => input.addEventListener('input', () => calculateRowTotal(input.closest('tr'))));
        unitPriceInputs.forEach(input => input.addEventListener('input', () => calculateRowTotal(input.closest('tr'))));
        discountInputs.forEach(input => input.addEventListener('input', () => calculateRowTotal(input.closest('tr'))));
        taxInputs.forEach(input => input.addEventListener('input', () => calculateRowTotal(input.closest('tr'))));

        productRows.forEach(row => calculateRowTotal(row));
    });
</script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf

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

        <div class="border p-4 bg-white" style="border-radius: 20px">


        <div class="row mb-3">
            <div class="col-md-4">
                <label for="reference">Reference *</label>
                <input type="text" name="reference" value="PO-{{ time() }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="customer">Supplier *</label>
                <select name="customer" class="form-control" required>
                    <option value="">Select Supplier</option>
                    <option value="Supplier 1">Supplier 1</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="date">Date *</label>
                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" required>
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
                        <tr id="no-products-row">
                            <td colspan="8" class="text-center">Please search & select products!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6 text-start fw-bold">Tax (0%)</div>
                            <div class="col-6 text-end">(+) PKR<span id="tax-amount">0.00</span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-start fw-bold">Discount (0%)</div>
                            <div class="col-6 text-end">(-) PKR<span id="discount-amount">0.00</span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-start fw-bold">Shipping</div>
                            <div class="col-6 text-end">(+) PKR<span id="shipping-amount">0.00</span></div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-6 text-start fw-bold">Grand Total</div>
                            <div class="col-6 text-end fw-bold">(=) PKR<span id="grand-total">0.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tax_percentage">Tax (%)</label>
                <input type="number" name="tax_percentage" id="tax_percentage" class="form-control" value="0" step="0.01">
            </div>
            <div class="col-md-4">
                <label for="discount_percentage">Discount (%)</label>
                <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="0" step="0.01">
            </div>
            <div class="col-md-4">
                <label for="shipping">Shipping (PKR)</label>
                <input type="number" name="shipping" id="shipping" class="form-control" value="0" step="0.01">
            </div>
        </div>

        <input type="hidden" name="total_amount" id="total_amount" value="0">

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="status">Order Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Payment Method <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Cash</option>
                    <option value="">Credit</option>
                    <option value="">Bank Transfer</option>
                    <option value="">Other</option>

                </select>
            </div>

            <div class="col-md-4">
                <label for="amount_paid">Amount Paid *</label>
                <input type="number" name="amount_paid" class="form-control" required step="0.01" min="0">
            </div>
        </div>

        <div class="mb-3">
            <label for="note">Note</label>
            <textarea name="note" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Create Sale Order</button>

        </div>
    </form>
</div>

<template id="product-row-template">
    <tr class="product-row">
        <td>
            <input type="hidden" name="product_id[]" class="product-id">
            <span class="product-name"></span>
        </td>
        <td><input type="number" name="unit_price[]" class="form-control unit-price" step="0.01" required></td>
        <td><span class="product-stock"></span></td>
        <td><input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" required></td>
        <td><input type="number" name="product_discount[]" class="form-control product-discount" step="0.01" value="0"></td>
        <td><input type="number" name="product_tax[]" class="form-control product-tax" step="0.01" value="0"></td>
        <td><span class="sub-total">0.00</span><input type="hidden" name="sub_total[]" class="sub-total-input"></td>
        <td><button type="button" class="btn btn-danger remove-product">X</button></td>
    </tr>
</template>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productList = document.getElementById('product-list');
        const noProductsRow = document.getElementById('no-products-row');
        const template = document.getElementById('product-row-template');
        const searchBtn = document.getElementById('search-btn');
        const productSearch = document.getElementById('product-search');

        const taxPercentageInput = document.getElementById('tax_percentage');
        const discountPercentageInput = document.getElementById('discount_percentage');
        const shippingInput = document.getElementById('shipping');

        const products = [
            @foreach($products as $product)
            {
                id: {{ $product->id }},
                name: "{{ $product->product_name }}",
                price: {{ $product->price }},
                stock: {{ $product->stock ?? 0 }},
                code: "{{ $product->code ?? '' }}"
            },
            @endforeach
        ];

        function calculateRowTotal(row) {
            const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
            const quantity = parseInt(row.querySelector('.quantity').value) || 0;
            const discount = parseFloat(row.querySelector('.product-discount').value) || 0;
            const tax = parseFloat(row.querySelector('.product-tax').value) || 0;

            const subtotal = (unitPrice * quantity) - discount + tax;
            row.querySelector('.sub-total').textContent = subtotal.toFixed(2);
            row.querySelector('.sub-total-input').value = subtotal.toFixed(2);

            calculateTotals();
        }

        function calculateTotals() {
            const rows = document.querySelectorAll('.product-row');
            let subtotal = 0;

            rows.forEach(row => {
                subtotal += parseFloat(row.querySelector('.sub-total-input').value) || 0;
            });

            const taxRate = parseFloat(taxPercentageInput.value) || 0;
            const discountRate = parseFloat(discountPercentageInput.value) || 0;
            const shipping = parseFloat(shippingInput.value) || 0;

            const taxAmount = subtotal * (taxRate / 100);
            const discountAmount = subtotal * (discountRate / 100);
            const grandTotal = subtotal + taxAmount - discountAmount + shipping;

            document.getElementById('tax-rate').textContent = taxRate.toFixed(2);
            document.getElementById('discount-rate').textContent = discountRate.toFixed(2);
            document.getElementById('tax-amount').textContent = taxAmount.toFixed(2);
            document.getElementById('discount-amount').textContent = discountAmount.toFixed(2);
            document.getElementById('shipping-amount').textContent = shipping.toFixed(2);
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
            document.getElementById('total_amount').value = grandTotal.toFixed(2);
        }

        function addProductRow(product) {
            if (noProductsRow) noProductsRow.style.display = 'none';

            const clone = template.content.cloneNode(true);
            clone.querySelector('.product-id').value = product.id;
            clone.querySelector('.product-name').textContent = product.name;
            clone.querySelector('.unit-price').value = product.price;
            clone.querySelector('.product-stock').textContent = product.stock;

            const row = clone.querySelector('tr');
            row.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', () => calculateRowTotal(row));
            });

            row.querySelector('.remove-product').addEventListener('click', function () {
                row.remove();
                if (!document.querySelector('.product-row')) {
                    noProductsRow.style.display = '';
                }
                calculateTotals();
            });

            productList.appendChild(row);
            calculateRowTotal(row);
        }

        searchBtn.addEventListener('click', () => {
            const term = productSearch.value.trim().toLowerCase();
            const found = products.find(p => p.name.toLowerCase().includes(term) || (p.code && p.code.toLowerCase().includes(term)));

            if (found) {
                addProductRow(found);
                productSearch.value = '';
            } else {
                alert('No matching product found.');
            }
        });

        [taxPercentageInput, discountPercentageInput, shippingInput].forEach(input => {
            input.addEventListener('input', calculateTotals);
        });
    });
</script>
@endpush
@endsection

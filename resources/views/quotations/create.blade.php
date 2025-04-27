@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('quotations.store') }}" method="POST">
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

        <div class="border p-4 rounded bg-white">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="reference" id="reference" value="QT" required>
            </div>
            <div class="col-md-4">
                <label for="customer" class="form-label">Customer <span class="text-danger">*</span></label>
                <select name="customer_id" id="customer" class="form-control" required>
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>
        </div>



        <div class="card mb-3">
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="bg-secondary  text-white ">
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
                        <tr id="no-products-row">
                            <td colspan="8" class="text-center">Please search & select products!</td>
                        </tr>
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
                            <div class="col-6 text-start fw-normal fw-bold">Grand Total</div>
                            <div class="col-6 text-end fw-bold">(=) PKR<span id="grand-total">0.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tax_percentage" class="form-label">Tax (%)</label>
                <input type="number" class="form-control" name="tax_percentage" id="tax_percentage" min="0" step="0.01" value="0">
            </div>
            <div class="col-md-4">
                <label for="discount_percentage" class="form-label">Discount (%)</label>
                <input type="number" class="form-control" name="discount_percentage" id="discount_percentage" min="0" step="0.01" value="0">
            </div>
            <div class="col-md-4">
                <label for="shipping" class="form-label">Shipping</label>
                <input type="number" class="form-control" name="shipping" id="shipping" min="0" step="0.01" value="0">
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note (If Needed)</label>
            <textarea name="note" id="note" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <input type="hidden" name="total_amount" id="total_amount" value="0">
            <button type="submit" class="btn btn-danger">Create Quotation
                <i class="fas fa-check"></i>
            </button>
        </div>


    </form>

</div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const productList = document.getElementById('product-list');
        const noProductsRow = document.getElementById('no-products-row');
        const template = document.getElementById('product-row-template');
        const searchBtn = document.getElementById('search-btn');
        const productSearch = document.getElementById('product-search');

        const taxPercentageInput = document.getElementById('tax_percentage');
        const discountPercentageInput = document.getElementById('discount_percentage');
        const shippingInput = document.getElementById('shipping');

        document.getElementById('date').valueAsDate = new Date();

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

            const taxPercentage = parseFloat(taxPercentageInput.value) || 0;
            const discountPercentage = parseFloat(discountPercentageInput.value) || 0;
            const shipping = parseFloat(shippingInput.value) || 0;

            const taxAmount = subtotal * (taxPercentage / 100);
            const discountAmount = subtotal * (discountPercentage / 100);
            const grandTotal = subtotal + taxAmount - discountAmount + shipping;

            document.getElementById('tax-amount').textContent = taxAmount.toFixed(2);
            document.getElementById('discount-amount').textContent = discountAmount.toFixed(2);
            document.getElementById('shipping-amount').textContent = shipping.toFixed(2);
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
            document.getElementById('total_amount').value = grandTotal.toFixed(2);
        }

        function addProductRow(product) {
            if (noProductsRow) {
                noProductsRow.style.display = 'none';
            }

            const clone = template.content.cloneNode(true);

            clone.querySelector('.product-id').value = product.id;
            clone.querySelector('.product-name').textContent = product.name;
            clone.querySelector('.unit-price').value = product.price;
            clone.querySelector('.product-stock').textContent = product.stock;

            const inputs = clone.querySelectorAll('input.unit-price, input.quantity, input.product-discount, input.product-tax');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    calculateRowTotal(this.closest('.product-row'));
                });
            });

            const removeBtn = clone.querySelector('.remove-product');
            removeBtn.addEventListener('click', function() {
                this.closest('.product-row').remove();
                if (document.querySelectorAll('.product-row').length === 0) {
                    noProductsRow.style.display = '';
                }
                calculateTotals();
            });

            productList.appendChild(clone);
            calculateRowTotal(productList.lastElementChild);
        }

        searchBtn.addEventListener('click', function() {
            const searchTerm = productSearch.value.toLowerCase();

            const foundProducts = products.filter(product =>
                product.name.toLowerCase().includes(searchTerm) ||
                (product.code && product.code.toLowerCase().includes(searchTerm))
            );

            if (foundProducts.length > 0) {
                addProductRow(foundProducts[0]);
                productSearch.value = '';
            } else {
                alert('No products found matching your search criteria.');
            }
        });

        taxPercentageInput.addEventListener('input', calculateTotals);
        discountPercentageInput.addEventListener('input', calculateTotals);
        shippingInput.addEventListener('input', calculateTotals);
    });
</script>
@endpush
@endsection

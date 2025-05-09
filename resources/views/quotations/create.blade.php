@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form id="quotation-form" action="{{ route('quotations.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4 shadow-sm" style="border-radius: 20px">
            <div class="card-body p-3">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control border-start-0" placeholder="Type product name or code..." aria-label="Search" name="search" id="product-search">
                    <button type="button" id="search-btn" class="btn btn-outline-secondary">Add Product</button>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow-sm" style="border-radius: 20px">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            <option value="">-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" required>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Net Unit Price</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="product-list"></tbody>
                        </table>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-bold">Tax <span id="tax-amount">(%)</span></div>
                                    <div class="col-6 text-end">(+) PKR<span id="tax-value">0.00</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-bold">Discount <span id="discount-amount">(%)</span></div>
                                    <div class="col-6 text-end">(-) PKR<span id="discount-value">0.00</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-bold">Shipping</div>
                                    <div class="col-6 text-end">(+) PKR<span id="shipping-value">0.00</span></div>
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
                        <label for="tax" class="form-label">Tax (%)</label>
                        <input type="number" step="0.01" name="tax" id="tax" class="form-control" value="{{ old('tax', 0) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', 0) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="shipping" class="form-label">Shipping</label>
                        <input type="number" step="0.01" name="shipping" id="shipping" class="form-control" value="{{ old('shipping', 0) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea name="note" id="note" class="form-control" rows="4">{{ old('note') }}</textarea>
                </div>

                <!-- ✅ Hidden input for total_amount -->
                <input type="hidden" name="total_amount" id="total_amount_input" value="0">

                <div class="row mb-3">
                    <div class="col-md-12 text-start">
                        <button type="submit" class="btn btn-primary">Create Quotation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let productIndex = 0;

    document.getElementById('search-btn').addEventListener('click', function () {
        const product = {
            id: 1,
            name: 'Example Product',
            price: 100,
            stock: 20
        };
        addProductRow(product);
    });

    function addProductRow(product) {
        let row = `
            <tr>
                <td>
                    ${product.name}
                    <input type="hidden" name="items[${productIndex}][product_id]" value="${product.id}">
                </td>
                <td>
                    <input type="number" name="items[${productIndex}][net_unit_price]" class="form-control unit-price" value="${product.price}" step="0.01" required>
                </td>
                <td>${product.stock}</td>
                <td>
                    <input type="number" name="items[${productIndex}][quantity]" class="form-control quantity" value="1" min="1" required>
                </td>
                <td>
                    <input type="number" name="items[${productIndex}][discount]" class="form-control discount" value="0" step="0.01">
                </td>
                <td>
                    <input type="number" name="items[${productIndex}][tax]" class="form-control tax" value="0" step="0.01">
                </td>
                <td>
                    <input type="number" name="items[${productIndex}][subtotal]" class="form-control subtotal" value="0.00" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-btn">X</button>
                </td>
            </tr>
        `;
        document.getElementById('product-list').insertAdjacentHTML('beforeend', row);
        productIndex++;
        calculateTotals();
    }

    document.getElementById('product-list').addEventListener('input', calculateTotals);
    document.getElementById('product-list').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-btn')) {
            e.target.closest('tr').remove();
            calculateTotals();
        }
    });

    ['tax', 'discount', 'shipping'].forEach(id => {
        document.getElementById(id).addEventListener('input', calculateTotals);
    });

    function updateTaxAmount() {
        let taxPercentage = parseFloat(document.getElementById('tax').value) || 0;
        document.getElementById('tax-amount').innerText = `(${taxPercentage}%)`;
        calculateTotals();
    }

    function updateDiscountAmount() {
        let discountPercentage = parseFloat(document.getElementById('discount').value) || 0;
        document.getElementById('discount-amount').innerText = `(${discountPercentage}%)`;
        calculateTotals();
    }

    document.getElementById('tax').addEventListener('input', updateTaxAmount);
    document.getElementById('discount').addEventListener('input', updateDiscountAmount);

    updateTaxAmount();
    updateDiscountAmount();

    function calculateTotals() {
        let rows = document.querySelectorAll('#product-list tr');
        let total = 0;

        rows.forEach(row => {
            let qty = parseFloat(row.querySelector('.quantity').value) || 0;
            let price = parseFloat(row.querySelector('.unit-price').value) || 0;
            let disc = parseFloat(row.querySelector('.discount').value) || 0;
            let tax = parseFloat(row.querySelector('.tax').value) || 0;

            let subtotal = (price - (price * disc) / 100 + (price * tax) / 100) * qty;
            row.querySelector('.subtotal').value = subtotal.toFixed(2);
            total += subtotal;
        });

        let totalTaxPercentage = parseFloat(document.getElementById('tax').value) || 0;
        let totalDiscount = parseFloat(document.getElementById('discount').value) || 0;
        let shipping = parseFloat(document.getElementById('shipping').value) || 0;

        let totalTaxAmount = (total * totalTaxPercentage) / 100;
        let totalDiscountAmount = (total * totalDiscount) / 100;

        let grandTotal = total + totalTaxAmount - totalDiscountAmount + shipping;

        document.getElementById('tax-value').innerText = totalTaxAmount.toFixed(2);
        document.getElementById('discount-value').innerText = totalDiscountAmount.toFixed(2);
        document.getElementById('shipping-value').innerText = shipping.toFixed(2);
        document.getElementById('grand-total').innerText = grandTotal.toFixed(2);

        // ✅ Update the hidden input for form submission
        document.getElementById('total_amount_input').value = grandTotal.toFixed(2);
    }
</script>

@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('quotations.update', $quotation->id) }}" method="POST">
        @csrf
        @method('PUT')

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
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12 text-start">
                        <button type="submit" class="btn btn-primary">Update Quotation</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference', $quotation->reference) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            <option value="">-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $quotation->customer_id) == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->customer_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ old('date', \Carbon\Carbon::parse($quotation->date)->format('Y-m-d')) }}" required>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="Type product name or code..." aria-label="Search" name="search" id="product-search">
                            <button type="button" id="search-btn" class="btn btn-outline-secondary">Add Product</button>
                        </div>

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
                            <tbody id="product-list">
                                @foreach($quotation->items as $item)
                                    <tr>
                                        <td>
                                            {{ $item->product_name }}
                                            <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                                        </td>
                                        <td>
                                            <input type="number" name="items[{{ $loop->index }}][net_unit_price]" class="form-control unit-price" value="{{ old('items['.$loop->index.'][net_unit_price]', $item->net_unit_price) }}" step="0.01" required>
                                        </td>
                                        <td>{{ $item->stock }}</td>
                                        <td>
                                            <input type="number" name="items[{{ $loop->index }}][quantity]" class="form-control quantity" value="{{ old('items['.$loop->index.'][quantity]', $item->quantity) }}" min="1" required>
                                        </td>
                                        <td>
                                            <input type="number" name="items[{{ $loop->index }}][discount]" class="form-control discount" value="{{ old('items['.$loop->index.'][discount]', $item->discount) }}" step="0.01">
                                        </td>
                                        <td>
                                            <input type="number" name="items[{{ $loop->index }}][tax]" class="form-control tax" value="{{ old('items['.$loop->index.'][tax]', $item->tax) }}" step="0.01">
                                        </td>
                                        <td>
                                            {{ number_format($item->subtotal, 2) }}
                                            <input type="hidden" name="items[{{ $loop->index }}][subtotal]" class="subtotal" value="{{ $item->subtotal }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-product-btn">X</button>
                                        </td>
                                    </tr>
                                @endforeach
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
                                    <div class="col-6 text-start fw-bold">Tax ({{ $quotation->tax_percentage }}%)</div>
                                    <div class="col-6 text-end">(+) PKR<span id="tax-amount">{{ number_format($quotation->tax_amount, 2) }}</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-bold">Discount ({{ $quotation->discount_percentage }}%)</div>
                                    <div class="col-6 text-end">(-) PKR<span id="discount-amount">{{ number_format($quotation->discount_amount, 2) }}</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-bold">Shipping</div>
                                    <div class="col-6 text-end">(+) PKR<span id="shipping-amount">{{ number_format($quotation->shipping_amount, 2) }}</span></div>
                                </div>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-6 text-start fw-normal fw-bold">Grand Total</div>
                                    <div class="col-6 text-end fw-bold">(=) PKR<span id="grand-total">{{ number_format($quotation->total_amount, 2) }}</span></div>
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
                        <input type="number" class="form-control" name="shipping" id="shipping" step="0.01" value="{{ old('shipping', $quotation->shipping) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="note" class="form-label">Note</label>
                        <textarea name="note" id="note" class="form-control" rows="4">{{ old('note', $quotation->note) }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update Quotation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let productIndex = {{ count($quotation->items) }};

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

    ['tax_percentage', 'discount_percentage', 'shipping'].forEach(id => {
        document.getElementById(id).addEventListener('input', calculateTotals);
    });

    function calculateTotals() {
        let rows = document.querySelectorAll('#product-list tr');
        let total = 0;

        rows.forEach(row => {
            let qty = parseFloat(row.querySelector('.quantity').value) || 0;
            let price = parseFloat(row.querySelector('.unit-price').value) || 0;
            let disc = parseFloat(row.querySelector('.discount').value) || 0;
            let tax = parseFloat(row.querySelector('.tax').value) || 0;

            let subtotal = (price - disc + tax) * qty;
            row.querySelector('.subtotal').value = subtotal.toFixed(2);
            total += subtotal;
        });

        let taxPercentage = parseFloat(document.getElementById('tax_percentage').value) || 0;
        let discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;
        let shipping = parseFloat(document.getElementById('shipping').value) || 0;

        let taxAmount = (total * taxPercentage) / 100;
        let discountAmount = (total * discountPercentage) / 100;

        document.getElementById('tax-amount').innerText = taxAmount.toFixed(2);
        document.getElementById('discount-amount').innerText = discountAmount.toFixed(2);
        document.getElementById('shipping-amount').innerText = shipping.toFixed(2);

        let grandTotal = total + taxAmount - discountAmount + shipping;
        document.getElementById('grand-total').innerText = grandTotal.toFixed(2);
    }

    calculateTotals();
</script>

@endsection

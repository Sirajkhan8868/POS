@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('stock-adjustments.store') }}" method="POST">
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

            <div class="border p-3 bg-white" style="border-radius: 20px">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                                <input type="text" name="reference" id="reference" class="form-control bg-light" value="ADJ" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" id="date" class="form-control bg-light" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="fw-medium">#</th>
                                    <th class="fw-medium">Product Name</th>
                                    <th class="fw-medium">Code</th>
                                    <th class="fw-medium">Stock</th>
                                    <th class="fw-medium">Quantity</th>
                                    <th class="fw-medium">Type</th>
                                    <th class="fw-medium">Action</th>
                                </tr>
                            </thead>
                            <tbody id="product-items">
                                <tr id="no-products-row">
                                    <td colspan="7" class="text-center text-danger py-3">Please search & select products!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-3 bg-white">
                        <label for="note" class="form-label">Note (If Needed)</label>
                        <textarea name="note" id="note" class="form-control bg-light" rows="4"></textarea>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-danger">
                        Create Adjustment <i class="fas fa-chevron-right ms-1"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- Template for a Product Row -->
    <template id="product-row-template">
        <tr class="product-row">
            <td class="product-index"></td>
            <td>
                <select name="product_id[]" class="form-select product-select" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-stock="{{ $product->stock }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input name="code[]" class="form-control product-code" readonly></td>
            <td><input name="stock[]" class="form-control product-stock" readonly></td>
            <td><input name="quantity[]" type="number" min="1" class="form-control" required></td>
            <td>
                <select name="type[]" class="form-select" required>
                    <option value="increase">Increase</option>
                    <option value="decrease">Decrease</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove-product">
                    <i class="fa fa-trash"></i> Remove
                </button>
            </td>
        </tr>
    </template>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productItems = document.getElementById('product-items');
            const noProductsRow = document.getElementById('no-products-row');
            const template = document.getElementById('product-row-template');
            const addProductBtn = document.createElement('button');
            addProductBtn.type = 'button';
            addProductBtn.id = 'add-product';
            addProductBtn.className = 'btn btn-primary mb-3';
            addProductBtn.innerHTML = '<i class="fas fa-plus"></i> Add Product';
            document.querySelector('.card-body.p-0').insertAdjacentElement('beforebegin', addProductBtn);

            function addProductRow() {
                if (noProductsRow) {
                    noProductsRow.style.display = 'none';
                }

                const clone = template.content.cloneNode(true);

                const index = document.querySelectorAll('.product-row').length + 1;
                clone.querySelector('.product-index').textContent = index;

                const select = clone.querySelector('.product-select');
                select

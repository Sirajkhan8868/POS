@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('stock-adjustments.update', $stockAdjustment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card mb-4 shadow-sm" style="border-radius: 20px">
            <div class="card-body p-3">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control border-start-0" placeholder="Type product name or code..." aria-label="Search" name="search" id="productSearch">
                </div>
                <ul id="search-results" class="list-group mt-2" style="display:none; position: absolute; z-index: 1000;"></ul> <!-- This will show the search results -->
            </div>
        </div>

        <div class="border p-3 bg-white" style="border-radius: 20px">
            <div class="card mb-4 shadow-sm">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="reference" class="form-label">Reference <span class="text-danger">*</span></label>
                            <input type="text" name="reference" id="reference" class="form-control bg-light" value="{{ old('reference', $stockAdjustment->reference) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" name="date" id="date" class="form-control bg-light" value="{{ old('date', \Carbon\Carbon::parse($stockAdjustment->date)->format('Y-m-d')) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <strong>Products</strong>
                </div>
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
                            @foreach($stockAdjustment->items as $index => $item)
                            <tr class="product-row">
                                <td class="product-index">{{ $loop->iteration }}</td>
                                <td>
                                    <input type="hidden" name="product_id[]" class="product-id" value="{{ $item->product_id }}">
                                    <input type="text" name="product_name[]" class="form-control bg-light product-name" value="{{ $item->product->product_name }}" readonly>
                                </td>
                                <td><input name="code[]" class="form-control product-code" value="{{ $item->product->product_code }}" readonly></td>
                                <td><input name="stock[]" class="form-control product-stock" value="{{ $item->product->quantity }}" readonly></td>
                                <td><input name="quantity[]" type="number" min="1" class="form-control" value="{{ $item->quantity }}" required></td>
                                <td>
                                    <select name="type[]" class="form-select" required>
                                        <option value="increase" {{ $item->type == 'increase' ? 'selected' : '' }}>Increase</option>
                                        <option value="decrease" {{ $item->type == 'decrease' ? 'selected' : '' }}>Decrease</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-product"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @if ($stockAdjustment->items->isEmpty())
                                <tr id="no-products-row">
                                    <td colspan="7" class="text-center text-danger py-3">Please search & press Enter to add product!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-body p-3 bg-white">
                    <label for="note" class="form-label">Note (If Needed)</label>
                    <textarea name="note" id="note" class="form-control bg-light" rows="4">{{ old('note', $stockAdjustment->note) }}</textarea>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-danger">
                    Update Adjustment <i class="fas fa-chevron-right ms-1"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<template id="product-row-template">
    <tr class="product-row">
        <td class="product-index"></td>
        <td>
            <input type="hidden" name="product_id[]" class="product-id">
            <input type="text" name="product_name[]" class="form-control bg-light product-name" readonly>
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
            <button type="button" class="btn btn-danger btn-sm remove-product"><i class="fas fa-trash"></i></button>
        </td>
    </tr>
</template>

<script>
    const availableProducts = @json($products);

    document.addEventListener('DOMContentLoaded', function () {
        const productItems = document.getElementById('product-items');
        const noProductsRow = document.getElementById('no-products-row');
        const productSearch = document.getElementById('productSearch');
        const searchResults = document.getElementById('search-results');

        let productRowIndex = {{ $stockAdjustment->items->count() }};

        function updateIndexes() {
            const rows = productItems.querySelectorAll('.product-row');
            rows.forEach((row, index) => {
                row.querySelector('.product-index').textContent = index + 1;
            });

            // Show "no-products" row if empty
            if (rows.length === 0) {
                noProductsRow.style.display = '';
            } else {
                noProductsRow.style.display = 'none';
            }
        }

        function addProductRow(product) {
            const productRowTemplate = document.getElementById('product-row-template');
            const row = productRowTemplate.content.cloneNode(true);
            const tr = row.querySelector('tr');

            tr.querySelector('.product-id').value = product.id;
            tr.querySelector('.product-name').value = product.product_name;
            tr.querySelector('.product-code').value = product.product_code;
            tr.querySelector('.product-stock').value = product.quantity;

            productItems.appendChild(tr);
            productRowIndex++;
            updateIndexes();
        }

        // Search functionality
        productSearch.addEventListener('input', function (e) {
            const searchTerm = e.target.value.trim().toLowerCase();
            if (!searchTerm) {
                searchResults.style.display = 'none';
                return;
            }

            const filteredProducts = availableProducts.filter(product =>
                product.product_name.toLowerCase().startsWith(searchTerm) ||
                product.product_code.toLowerCase().startsWith(searchTerm)
            );

            if (filteredProducts.length === 0) {
                searchResults.style.display = 'none';
            } else {
                searchResults.innerHTML = '';

                filteredProducts.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.classList.add('list-group-item', 'cursor-pointer');
                    listItem.textContent = `${product.product_name} (${product.product_code})`;
                    listItem.addEventListener('click', function () {
                        addProductRow(product);
                        productSearch.value = '';
                        searchResults.style.display = 'none';
                    });
                    searchResults.appendChild(listItem);
                });
                searchResults.style.display = 'block';
            }
        });

        // Hide search dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('#productSearch') && !e.target.closest('#search-results')) {
                searchResults.style.display = 'none';
            }
        });

        // Remove product row
        productItems.addEventListener('click', function (e) {
            if (e.target.closest('.remove-product')) {
                const row = e.target.closest('.product-row');
                row.remove();
                updateIndexes();
            }
        });

        // Initial index update on load (in case items already exist)
        updateIndexes();
    });
</script>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('stock-adjustments.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <input type="search" class="form-control" placeholder="Search product..." aria-label="Search" name="search">

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="reference">Reference <span class="text-danger">*</span></label>
                    <input type="text" name="reference" id="reference" class="form-control" value="ADJ" required>
                </div>
                <div class="col-md-6">
                    <label for="date">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="fw-normal">#</th>
                                <th class="fw-normal">Product Name</th>
                                <th class="fw-normal">Code</th>
                                <th class="fw-normal">Stock</th>
                                <th class="fw-normal">Quantity</th>
                                <th class="fw-normal">Type</th>
                                <th class="fw-normal">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-items">
                            <tr id="no-products-row">
                                <td colspan="7" class="text-center">Please search & select products!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="mb-3">
                <label for="note">Note (If Needed)</label>
                <textarea name="note" id="note" class="form-control" rows="4"></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-danger">Create Adjustment</button>
            </div>
        </form>
    </div>

    <template id="product-row-template">
        <tr class="product-row">
            <td class="product-index"></td>
            <td>
                <select name="product_id[]" class="form-control product-select" required>
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
                <select name="type[]" class="form-control" required>
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
            const addProductBtn = document.getElementById('add-product');

            function addProductRow() {
                if (noProductsRow) {
                    noProductsRow.style.display = 'none';
                }

                const clone = template.content.cloneNode(true);

                const index = document.querySelectorAll('.product-row').length + 1;
                clone.querySelector('.product-index').textContent = index;

                const select = clone.querySelector('.product-select');
                select.addEventListener('change', function() {
                    const option = this.options[this.selectedIndex];
                    const row = this.closest('.product-row');

                    row.querySelector('.product-code').value = option.dataset.code || '';
                    row.querySelector('.product-stock').value = option.dataset.stock || '0';
                });

                const removeBtn = clone.querySelector('.remove-product');
                removeBtn.addEventListener('click', function() {
                    this.closest('.product-row').remove();
                    updateProductIndices();

                    if (document.querySelectorAll('.product-row').length === 0) {
                        noProductsRow.style.display = '';
                    }
                });

                productItems.appendChild(clone);
            }

            function updateProductIndices() {
                document.querySelectorAll('.product-row').forEach((row, index) => {
                    row.querySelector('.product-index').textContent = index + 1;
                });
            }

            addProductBtn.addEventListener('click', addProductRow);
        });
    </script>
    @endpush
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Sale</h2>

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf

        <div class="form-group">
            <label>Reference *</label>
            <input type="text" name="reference" value="SL" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Customer *</label>
            <select name="customer" class="form-control" required>
                <option value="">Select Customer</option>
                <option value="Customer 1">Customer 1</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date *</label>
            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" required>
        </div>

        <hr>
        <h5>Products</h5>
        <table class="table" id="product-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Net Unit Price</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="product-body">
                <tr>
                    <td><input type="text" name="items[0][product_name]" class="form-control" required></td>
                    <td><input type="number" name="items[0][net_unit_price]" class="form-control" required></td>
                    <td><input type="number" name="items[0][stock]" class="form-control" required></td>
                    <td><input type="number" name="items[0][quantity]" class="form-control" required></td>
                    <td><input type="number" name="items[0][discount]" class="form-control" required></td>
                    <td><input type="number" name="items[0][tax]" class="form-control" required></td>
                    <td><input type="number" name="items[0][subtotal]" class="form-control" required></td>
                    <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" id="add-row">Add Product</button>

        <hr>

        <div class="form-group">
            <label>Tax (%)</label>
            <input type="number" name="tax" value="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Discount (%)</label>
            <input type="number" name="discount" value="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Shipping</label>
            <input type="number" name="shipping" value="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Status *</label>
            <select name="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Sale</button>
    </form>
</div>

<script>
    let rowIndex = 1;
    document.getElementById('add-row').addEventListener('click', () => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="items[${rowIndex}][product_name]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][net_unit_price]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][stock]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][quantity]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][discount]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][tax]" class="form-control" required></td>
            <td><input type="number" name="items[${rowIndex}][subtotal]" class="form-control" required></td>
            <td><button type="button" class="btn btn-danger remove-row">X</button></td>
        `;
        document.getElementById('product-body').appendChild(row);
        rowIndex++;
    });

    document.getElementById('product-body').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection

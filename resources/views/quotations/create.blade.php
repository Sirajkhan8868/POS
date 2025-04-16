@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Create New Quotation</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('quotations.store') }}">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Reference</label>
                    <input type="text" name="reference" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Customer</label>
                    <input type="text" name="customer" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Tax</label>
                    <input type="number" step="0.01" name="tax" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Discount</label>
                    <input type="number" step="0.01" name="discount" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Shipping</label>
                    <input type="number" step="0.01" name="shipping" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Total Amount</label>
                    <input type="number" step="0.01" name="total_amount" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <hr>
            <h5>Add Quotation Items</h5>
            <div id="item-section">
                <div class="row mb-2 item-group">
                    <div class="col-md-4">
                        <input type="text" name="items[0][product_name]" placeholder="Product Name" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="items[0][stock]" placeholder="Stock" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="items[0][quantity]" placeholder="Qty" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="items[0][net_unit_price]" placeholder="Unit Price" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="items[0][subtotal]" placeholder="Subtotal" class="form-control">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-secondary mb-3" onclick="addItem()">+ Add Item</button>

            <button type="submit" class="btn btn-success w-100">Save Quotation</button>
        </form>
    </div>

    <script>
        let itemIndex = 1;

        function addItem() {
            const section = document.getElementById('item-section');
            const html = `
                <div class="row mb-2 item-group">
                    <div class="col-md-4">
                        <input type="text" name="items[${itemIndex}][product_name]" placeholder="Product Name" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="items[${itemIndex}][stock]" placeholder="Stock" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="items[${itemIndex}][quantity]" placeholder="Qty" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="items[${itemIndex}][net_unit_price]" placeholder="Unit Price" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="items[${itemIndex}][subtotal]" placeholder="Subtotal" class="form-control">
                    </div>
                </div>
            `;
            section.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }
    </script>
@endsection

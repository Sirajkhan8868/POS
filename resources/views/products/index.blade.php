@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <button class="btn btn-danger mb-3" id="addProduct">
                <i class="fas fa-plus"></i> Add Product
            </button>
            <div class="d-flex justify-content-between mb-3">
                <div>
                    Show
                    <select class="form-select form-select-sm d-inline-block w-auto">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    entries
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-file-excel"></i> Excel
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-sync"></i> Reload
                    </button>
                </div>
                <div class="d-flex">
                    <span class="me-2">Search:</span>
                    <input type="text" id="productSearch" class="form-control form-control-sm" placeholder="Search product name code">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center fw-bold">Name</th>
                            <th class="text-center fw-bold">Code</th>
                            <th class="text-center fw-bold">Category</th>
                            <th class="text-center fw-bold">Cost</th>
                            <th class="text-center fw-bold">Price</th>
                            <th class="text-center fw-bold">Quantity</th>
                            <th class="text-center fw-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->product_name }}</td>
                                <td class="text-center">{{ $product->product_code }}</td>
                                <td class="text-center">{{ $product->category->category_name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->cost ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->price ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->quantity ?? 0 }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries</div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addProduct').addEventListener('click', function () {
        window.location.href = "{{ route('products.create') }}";
    });

    document.getElementById('productSearch').addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#productTableBody tr');

        rows.forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const code = row.cells[1].textContent.toLowerCase();

            if (name.includes(searchValue) || code.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection

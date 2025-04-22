@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <button class="btn btn-danger mb-3" id="addQuotation">
        <i class="fas fa-plus"></i> Add Quotation
    </button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
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
                    <span>Search:</span>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center fw-normal">Date</th>
                            <th class="text-center fw-normal">Reference</th>
                            <th class="text-center fw-normal">Products</th>
                            <th class="text-center fw-normal">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($quotations) && count($quotations) > 0)
                            @foreach($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->date }}</td>
                                    <td>{{ $quotation->reference }}</td>
                                    <td>{{ $quotation->products_count ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('quotations.show', $quotation) }}" class="btn btn-info btn-sm">View</a>
                                        <form action="{{ route('quotations.destroy', $quotation) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this quotation?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>Showing 0 to 0 of 0 entries</div>
                <div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addQuotation').addEventListener('click', function() {
        window.location.href = "{{ route('quotations.create') }}";
    });
</script>
@endsection

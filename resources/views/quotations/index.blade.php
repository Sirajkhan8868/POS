@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <button class="btn btn-danger" id="addQuotation">
                    <i class="fas fa-plus"></i> Add Quotation
                </button>

                <div class="d-flex align-items-center gap-2">
                    <label>Show</label>
                    <select class="form-select form-select-sm w-auto" id="showEntries">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entries</span>
                </div>

                <div class="btn-group">
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-excel"></i> Excel</button>
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-print"></i> Print</button>
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-redo"></i> Reset</button>
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync"></i> Reload</button>
                </div>

                <div class="input-group input-group-sm w-auto">
                    <span class="input-group-text">Search</span>
                    <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->date }}</td>
                                <td>{{ $quotation->reference }}</td>
                                <td>{{ $quotation->customer->customer_name ?? 'N/A' }}</td>
                                <td>{{ $quotation->status }}</td>
                                <td>{{ number_format($quotation->total_amount, 2) }}</td>
                                <td>
                                    <a href="{{ route('quotations.show', $quotation) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('quotations.edit', $quotation) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('quotations.destroy', $quotation) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No quotations available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                <div>
                    Showing {{ $quotations->firstItem() ?? 0 }} to {{ $quotations->lastItem() ?? 0 }} of {{ $quotations->total() }} entries
                </div>
                <div>{{ $quotations->links() }}</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addQuotation').addEventListener('click', function() {
        window.location.href = "{{ route('quotations.create') }}";
    });

    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value;
        window.location.href = "{{ route('quotations.index') }}?search=" + searchTerm;
    });

    document.getElementById('showEntries').addEventListener('change', function(e) {
        const entriesPerPage = e.target.value;
        window.location.href = "{{ route('quotations.index') }}?per_page=" + entriesPerPage;
    });
</script>
@endsection

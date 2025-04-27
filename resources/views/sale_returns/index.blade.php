@extends('layouts.app')

@section('content')
<div class="container mt-4">



    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <button class="btn btn-danger mb-3" id="addSaleReturn">
                Add Sale Return <i class="fas fa-plus"></i>
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
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Reference</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($returns) && count($returns) > 0)
                            @foreach($returns as $return)
                                <tr>
                                    <td class="text-center">{{ $return->date }}</td>
                                    <td class="text-center">{{ $return->reference }}</td>
                                    <td class="text-center">{{ $return->customer->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ number_format($return->total_amount, 2) }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $return->status == 'Approved' ? 'success' : ($return->status == 'Rejected' ? 'danger' : 'warning') }}">
                                            {{ $return->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('sale_returns.show', $return) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('sale_returns.edit', $return) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('sale_returns.destroy', $return) }}" method="POST" style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this return?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No sale returns available.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>Showing {{ count($returns) }} entries</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addSaleReturn').addEventListener('click', function() {
        window.location.href = "{{ route('sale_returns.create') }}";
    });
</script>
@endsection

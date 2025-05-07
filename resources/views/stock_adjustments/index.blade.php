@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <button class="btn btn-danger mb-3" id="addStockAdjustment">
                <i class="fas fa-plus"></i> Add Adjustment
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
                            <th class="text-center fw-medium">Date</th>
                            <th class="text-center fw-medium">Reference</th>
                            <th class="text-center fw-medium">Products</th>
                            <th class="text-center fw-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($adjustments as $adjustment)
                            <tr>
                                <td class="text-center">{{ $adjustment->date }}</td>
                                <td class="text-center">{{ $adjustment->reference }}</td>
                                <td class="text-center">{{ $adjustment->items->count() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('stock-adjustments.edit', $adjustment) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="{{ route('stock-adjustments.show', $adjustment) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <form action="{{ route('stock-adjustments.destroy', $adjustment) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available in table</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addStockAdjustment').addEventListener('click', function() {
        window.location.href = "{{ route('stock-adjustments.create') }}";
    });
</script>
@endsection

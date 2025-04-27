@extends('layouts.app')

@section('content')
<div class="container mt-4 border p-3 rounded bg-white" style="border-radius: 30px">

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <a href="{{ route('units.create') }}" class="btn btn-danger">
            <i class="fas fa-plus"></i> Add Unit
        </a>
    </div>

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

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Short Name</th>
                        <th class="text-center">Operator</th>
                        <th class="text-center">Operator Value</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($units as $unit)
                        <tr>
                            <td>{{ $unit->name }}</td>
                            <td>{{ $unit->short_name }}</td>
                            <td>{{ $unit->operator ?? '-' }}</td>
                            <td>{{ $unit->operator_value }}</td>
                            <td class="text-center">
                                <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this unit?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No units found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
@endsection

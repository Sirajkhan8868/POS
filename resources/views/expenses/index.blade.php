@extends('layouts.app')

@section('content')
<div class="container mt-4">



    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <button class="btn btn-danger mb-3" id="addExpense">
                <i class="fas fa-plus"></i> Add Expense
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
                    <thead class="bg-black text-white">
                        <tr class="bg-black">
                            <th class="text-center fw-normal">Date</th>
                            <th class="text-center fw-normal">Reference</th>
                            <th class="text-center fw-normal">Category</th>
                            <th class="text-center fw-normal">Amount</th>
                            <th class="text-center fw-normal">Details</th>
                            <th class="text-center fw-normal">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($expenses) && count($expenses) > 0)
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->reference }}</td>
                                    <td>{{ $expense->category }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->details }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('expenses.show', $expense) }}" class="btn btn-info btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this expense?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No data available in table</td>
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
    document.getElementById('addExpense').addEventListener('click', function() {
        window.location.href = "{{ route('expenses.create') }}";
    });
</script>
@endsection

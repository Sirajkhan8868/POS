@extends('layouts.app')

@section('content')
<div class="container mt-4">



    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <button class="btn btn-danger mb-3" id="addCategory">
                <i class="fas fa-plus"></i> Add Category
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
                        <input type="text" class="form-control form-control-sm" placeholder="Search category...">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center fw-normal">Category Code</th>
                            <th class="text-center fw-normal">Category Name</th>
                            <th class="text-center fw-normal">Product Count</th>
                            <th class="text-center fw-normal">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($categories) && count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->category_code }}</td>
                                    <td class="text-center">{{ $category->category_name }}</td>
                                    <td class="text-center">{{ $category->product_count }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm" title="Show">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No categories found.</td>
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
    document.getElementById('addCategory').addEventListener('click', function() {
        window.location.href = "{{ route('categories.create') }}";
    });
</script>
@endsection

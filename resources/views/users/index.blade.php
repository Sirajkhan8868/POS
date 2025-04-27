@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <a href="{{ route('users.create') }}" class="btn btn-danger mb-3">
        <i class="fas fa-plus"></i> Add User
    </a>

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
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="text-center fw-normal">Name</th>
                            <th class="text-center fw-normal">Email</th>
                            <th class="text-center fw-normal">Role</th>
                            <th class="text-center fw-normal">Status</th>
                            <th class="text-center fw-normal">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ ucfirst($user->status) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-link text-warning" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-link text-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>Showing 1 to {{ $users->count() }} of {{ $users->count() }} entries</div>
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
@endsection

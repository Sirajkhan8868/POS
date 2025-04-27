@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-danger">
                <i class="fas fa-user-shield"></i> Create Role
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}">
                @csrf
                @if(isset($permission)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Permission Name <small class="text-muted"></small></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Action Label <small class="text-muted"></small></label>
                    <input type="text" name="action" class="form-control" value="{{ old('action', $permission->action ?? '') }}" required>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($permission) ? 'Edit' : 'Add' }} Permission</h2>
    <form method="POST" action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}">
        @csrf
        @if(isset($permission)) @method('PUT') @endif

        <div class="form-group">
            <label>Permission Name (e.g., `edit-user`)</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Action Label (e.g., `Edit User`)</label>
            <input type="text" name="action" class="form-control" value="{{ old('action', $permission->action ?? '') }}" required>
        </div>

        <button class="btn btn-success mt-2">{{ isset($permission) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection

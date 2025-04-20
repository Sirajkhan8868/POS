@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($user) ? 'Edit User' : 'Add User' }}</h2>

    <form method="POST" enctype="multipart/form-data"
        action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password {{ isset($user) ? '(Leave blank to keep current)' : '' }}</label>
            <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                @foreach(['admin', 'user', 'manager'] as $role)
                    <option value="{{ $role }}" {{ (old('role', $user->role ?? '') == $role) ? 'selected' : '' }}>
                        {{ ucfirst($role) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                @foreach(['active', 'inactive'] as $status)
                    <option value="{{ $status }}" {{ (old('status', $user->status ?? '') == $status) ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @if(isset($user) && $user->image)
                <img src="{{ asset('storage/' . $user->image) }}" width="80" class="mt-2">
            @endif
        </div>

        <button class="btn btn-success mt-2">{{ isset($user) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection

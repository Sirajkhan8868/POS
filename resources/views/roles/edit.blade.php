@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Role</h3>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>



        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
</div>
@endsection

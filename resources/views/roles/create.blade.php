@extends('layouts.app')

@section('content')
<div class="container mt-4 border p-3 rounded bg-white" style="border-radius: 30px">
    <button type="submit" class="btn btn-primary mt-3">
        <i class="fas fa-plus me-2"></i> Create Role
    </button>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>


    </form>


</div>
@endsection

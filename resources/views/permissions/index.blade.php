@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Permissions</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Add Permission</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Action</th><th>Manage</th></tr></thead>
        <tbody>
        @foreach($permissions as $perm)
            <tr>
                <td>{{ $perm->name }}</td>
                <td>{{ $perm->action }}</td>
                <td>
                    <a href="{{ route('permissions.edit', $perm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('permissions.destroy', $perm->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

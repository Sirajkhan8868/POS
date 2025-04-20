@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Units</h2>
    <a href="{{ route('units.create') }}" class="btn btn-primary mb-3">Add Unit</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Short Name</th><th>Operator</th><th>Value</th><th>Action</th></tr></thead>
        <tbody>
            @foreach($units as $unit)
                <tr>
                    <td>{{ $unit->name }}</td>
                    <td>{{ $unit->short_name }}</td>
                    <td>{{ $unit->operator }}</td>
                    <td>{{ $unit->operator_value }}</td>
                    <td>
                        <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this unit?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

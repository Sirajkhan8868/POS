@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Unit Details</h4>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Unit Name</th>
                    <td>{{ $unit->name }}</td>
                </tr>
                <tr>
                    <th>Short Name</th>
                    <td>{{ $unit->short_name }}</td>
                </tr>
                <tr>
                    <th>Operator</th>
                    <td>{{ $unit->operator ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Operator Value</th>
                    <td>{{ $unit->operator_value }}</td>
                </tr>
            </table>

            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('units.index') }}" class="btn btn-secondary ms-2">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection

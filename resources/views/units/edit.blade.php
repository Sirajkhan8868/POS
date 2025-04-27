@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Unit</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('units.update', $unit->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Unit Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $unit->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Short Name</label>
                    <input type="text" name="short_name" class="form-control" value="{{ old('short_name', $unit->short_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Operator</label>
                    <input type="text" name="operator" class="form-control" value="{{ old('operator', $unit->operator) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Operator Value</label>
                    <input type="number" step="0.01" name="operator_value" class="form-control" value="{{ old('operator_value', $unit->operator_value) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('units.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

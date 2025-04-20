@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($unit) ? 'Edit' : 'Add' }} Unit</h2>

    <form method="POST" action="{{ isset($unit) ? route('units.update', $unit->id) : route('units.store') }}">
        @csrf
        @if(isset($unit)) @method('PUT') @endif

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $unit->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Short Name</label>
            <input type="text" name="short_name" class="form-control" value="{{ old('short_name', $unit->short_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Operator (Optional, e.g., *)</label>
            <input type="text" name="operator" class="form-control" value="{{ old('operator', $unit->operator ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Operator Value</label>
            <input type="number" step="0.01" name="operator_value" class="form-control" value="{{ old('operator_value', $unit->operator_value ?? 1) }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($unit) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection

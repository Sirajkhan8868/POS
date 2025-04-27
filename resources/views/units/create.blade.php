@extends('layouts.app')

@section('content')
<div class="container mt-4 border p-3 rounded bg-white" style="border-radius: 30px">


    <form action="{{ isset($unit) ? route('units.update', $unit->id) : route('units.store') }}" method="POST">
        @csrf
        @isset($unit)
            @method('PUT')
        @endisset

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Unit Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $unit->name ?? '') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Short Name</label>
                <input type="text" name="short_name" class="form-control" value="{{ old('short_name', $unit->short_name ?? '') }}" required>
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Operator</label>
                <input type="text" name="operator" class="form-control" value="{{ old('operator', $unit->operator ?? '') }}">
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Operator Value</label>
                <input type="number" step="0.01" name="operator_value" class="form-control" value="{{ old('operator_value', $unit->operator_value ?? 1) }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> {{ isset($unit) ? 'Update' : 'Create' }} Unit
            </button>
        </div>
    </form>

</div>
@endsection

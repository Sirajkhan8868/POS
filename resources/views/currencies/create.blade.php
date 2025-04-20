@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($currency) ? 'Edit Currency' : 'Add Currency' }}</h2>

    <form method="POST" action="{{ isset($currency) ? route('currencies.update', $currency->id) : route('currencies.store') }}">
        @csrf
        @if(isset($currency)) @method('PUT') @endif

        <div class="mb-3">
            <label>Currency Name</label>
            <input type="text" name="currency_name" class="form-control" value="{{ old('currency_name', $currency->currency_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $currency->code ?? '') }}" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label>Symbol</label>
            <input type="text" name="symbol" class="form-control" value="{{ old('symbol', $currency->symbol ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Thousand Separator</label>
            <input type="text" name="thousand_operator" class="form-control" value="{{ old('thousand_operator', $currency->thousand_operator ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Decimal Separator</label>
            <input type="text" name="decimal_operator" class="form-control" value="{{ old('decimal_operator', $currency->decimal_operator ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($currency) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection

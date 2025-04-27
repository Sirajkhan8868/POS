@extends('layouts.app')

@section('content')
<div class="container">


    <form method="POST" action="{{ isset($currency) ? route('currencies.update', $currency->id) : route('currencies.store') }}">
        @csrf
        @if(isset($currency)) @method('PUT') @endif
        <button type="submit" class="btn btn-danger mt-3 mb-3">
            <i class="fas fa-save"></i> {{ isset($currency) ? 'Update' : 'Create Currency' }}
        </button>

        <div class="border p-3 rounded bg-white" style="border-radius: 30px">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="currency_name">Currency Name</label>
                    <input type="text" id="currency_name" name="currency_name" class="form-control" value="{{ old('currency_name', $currency->currency_name ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="code">Code</label>
                    <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $currency->code ?? '') }}" maxlength="3" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="symbol">Symbol</label>
                    <input type="text" id="symbol" name="symbol" class="form-control" value="{{ old('symbol', $currency->symbol ?? '') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="thousand_operator">Thousand Separator</label>
                    <input type="text" id="thousand_operator" name="thousand_operator" class="form-control" value="{{ old('thousand_operator', $currency->thousand_operator ?? '') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="decimal_operator">Decimal Separator</label>
                    <input type="text" id="decimal_operator" name="decimal_operator" class="form-control" value="{{ old('decimal_operator', $currency->decimal_operator ?? '') }}" required>
                </div>
            </div>
        </div>



            </form>
</div>
@endsection

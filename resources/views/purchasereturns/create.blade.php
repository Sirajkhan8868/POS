@extends('layouts.app')

@section('content')
    <h1>Create Purchase Return</h1>

    <form action="{{ route('purchase-returns.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reference" class="form-label">Reference</label>
            <input type="text" class="form-control" id="reference" name="reference" required>
        </div>

        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Purchase Return</button>
    </form>
@endsection

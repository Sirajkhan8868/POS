@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="bg-white p-4 mb-4" style="border-radius: 20px;">
        <form action="{{ route('profit_losses.store') }}" method="POST">
            @csrf

            <div class="row align-items-end">
                <div class="form-group col-md-6 mb-3">
                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="end_date">End Date <span class="text-danger">*</span></label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>
            <div class="form-group col-md-2 mb-3 text-center">
                <button type="submit" class="btn btn-danger w-100 mt-2">
                    <i class="fas fa-filter"></i> Filter Report
                </button>
            </div>
        </form>
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-receipt fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR1,840.00</h5>
                    <small class="text-muted">5 SALES</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-undo-alt fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR0.00</h5>
                    <small class="text-muted">0 SALE RETURNS</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-trophy fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR992.00</h5>
                    <small class="text-muted">PROFIT</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-shopping-bag fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR0.00</h5>
                    <small class="text-muted">0 PURCHASES</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-undo fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR0.00</h5>
                    <small class="text-muted">0 PURCHASE RETURNS</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-wallet fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR0.00</h5>
                    <small class="text-muted">EXPENSES</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR3,187.22</h5>
                    <small class="text-muted">PAYMENTS RECEIVED</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-money-check-alt fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR0.00</h5>
                    <small class="text-muted">PAYMENTS SENT</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="bg-white d-flex align-items-center p-3" style="border-radius: 20px;">
                <div class="me-3">
                    <i class="fas fa-coins fa-2x text-primary"></i>
                </div>
                <div>
                    <h5 class="mb-0">PKR3,187.22</h5>
                    <small class="text-muted">PAYMENTS NET</small>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

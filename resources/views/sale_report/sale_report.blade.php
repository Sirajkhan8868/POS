@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h4 class="mb-4">Sale Report</h4>

    <div class="card mb-4">
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date *</label>
                        <input type="date" id="start_date" class="form-control" name="start_date" required>
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">End Date *</label>
                        <input type="date" id="end_date" class="form-control" name="end_date" required>
                    </div>
                    <div class="col-md-3">
                        <label for="customer" class="form-label">Customer</label>
                        <select class="form-control" id="customer" name="customer_id">
                            <option value="">Select</option>
                            <option value="school">School</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="unpaid">Unpaid</option>
                            <option value="partial">Partial</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-danger" type="submit">
                    <i class="fas fa-filter me-1"></i> Filter Report
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Reference</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8" class="text-center text-danger">No Sale Data Available!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="p-6">
    <nav class="text-sm mb-4 text-gray-600">
        <a href="{{ route('home') }}" class="text-blue-500">Home</a> / Purchases Report
    </nav>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form method="GET" action="#">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date *</label>
                    <input type="date" name="start_date" id="start_date" class="form-input w-full" value="{{ old('start_date') }}">
                </div>
                <div>
                    <label for="end_date" class="block font-medium text-sm text-gray-700">End Date *</label>
                    <input type="date" name="end_date" id="end_date" class="form-input w-full" value="{{ old('end_date') }}">
                </div>
                <div>
                    <label for="supplier" class="block font-medium text-sm text-gray-700">Supplier</label>
                    <select name="supplier" id="supplier" class="form-select w-full">
                        <option value="">Select Supplier</option>
                        <option value="school" selected>School</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                    <select name="status" id="status" class="form-select w-full">
                        <option value="completed" selected>Completed</option>
                        <!-- Other statuses -->
                    </select>
                </div>
                <div>
                    <label for="payment_status" class="block font-medium text-sm text-gray-700">Payment Status</label>
                    <select name="payment_status" id="payment_status" class="form-select w-full">
                        <option value="unpaid" selected>Unpaid</option>
                        <!-- Other payment statuses -->
                    </select>
                </div>
            </div>

            <div class="flex justify-start">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                    Filter Report
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg mt-6 overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Reference</th>
                    <th class="px-4 py-3">Supplier</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Paid</th>
                    <th class="px-4 py-3">Due</th>
                    <th class="px-4 py-3">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8" class="text-center text-red-600 py-4">No Purchases Data Available!</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

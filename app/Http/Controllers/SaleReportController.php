<?php

namespace App\Http\Controllers;

use App\Models\SaleReport;
use App\Models\SaleReportItem;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $query = SaleReportItem::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('customer_id')) {
            $query->where('customer_id', $request->customer_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $reports = $query->get();

        return view('sale_reports.index', compact('customers', 'reports'));
    }
}

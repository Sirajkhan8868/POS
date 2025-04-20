<?php

namespace App\Http\Controllers;

use App\Models\SaleReturnReport;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleReturnReportController extends Controller
{
    /**
     * Display a listing of the sale return reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Fetch all customers
        $customers = Customer::all();

        // Build the query for the sale return reports
        $query = SaleReturnReport::query();

        if ($request->has('start_date') && $request->start_date) {
            $query->where('start_date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->where('end_date', '<=', $request->end_date);
        }

        if ($request->has('customer_id') && $request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $saleReturnReports = $query->paginate(10);

        return view('sale_report.sale_return_report', [
            'saleReturnReports' => $saleReturnReports,
            'customers' => $customers,
        ]);
    }
}

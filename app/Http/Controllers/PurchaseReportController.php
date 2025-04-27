<?php

namespace App\Http\Controllers;

use App\Models\PurchaseReport;
use App\Models\PurchaseReportItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::all();
        $query = PurchaseReportItem::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('supplier_id')) {
            $query->where('supplier_id', $request->supplier_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $reports = $query->get();

        return view('purchase_reports.index', compact('suppliers', 'reports'));
    }
}

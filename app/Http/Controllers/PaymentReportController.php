<?php

namespace App\Http\Controllers;

use App\Models\PaymentReport;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function index()
    {
        $paymentReports = PaymentReport::all();
        return view('payment_reports.index', compact('paymentReports'));
    }

    public function create()
    {
        return view('payment_reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payment' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
        ]);

        PaymentReport::create($request->all());

        return redirect()->route('payment_reports.index')->with('success', 'Payment Report Created Successfully!');
    }
}

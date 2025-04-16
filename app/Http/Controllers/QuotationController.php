<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::with('items')->get();
        return view('quotations.index', compact('quotations'));
    }

    public function create()
    {
        return view('quotations.create');
    }

    public function store(Request $request)
    {
        $quotation = Quotation::create($request->only([
            'reference', 'customer', 'date', 'tax', 'discount',
            'shipping', 'total_amount', 'status'
        ]));

        foreach ($request->items as $item) {
            $quotation->items()->create($item);
        }

        return redirect()->route('quotations.index')->with('success', 'Quotation created successfully.');
    }

    public function show(Quotation $quotation)
    {
        return view('quotations.show', compact('quotation'));
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->delete();
        return back()->with('success', 'Quotation deleted.');
    }
}

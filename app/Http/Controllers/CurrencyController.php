<?php
namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency_name' => 'required',
            'code' => 'required|size:3|unique:currencies',
            'symbol' => 'required',
            'thousand_operator' => 'required',
            'decimal_operator' => 'required'
        ]);

        Currency::create($request->all());
        return redirect()->route('currencies.index')->with('success', 'Currency added successfully.');
    }

    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'currency_name' => 'required',
            'code' => 'required|size:3|unique:currencies,code,' . $currency->id,
            'symbol' => 'required',
            'thousand_operator' => 'required',
            'decimal_operator' => 'required'
        ]);

        $currency->update($request->all());
        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully.');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully.');
    }
}

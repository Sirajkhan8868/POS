<?php
namespace App\Http\Controllers;

use App\Models\ProfitLoss;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
    /**
     * Display a listing of the profit losses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profitLosses = ProfitLoss::with(['sale', 'saleReturn', 'purchase', 'purchaseReturn'])->get();
        return view('profit_losses.index', compact('profitLosses'));
    }

    /**
     * Show the form for creating a new profit loss.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profit_losses.create');
    }

    /**
     * Store a newly created profit loss in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'nullable|exists:sales,id',
            'sale_return_id' => 'nullable|exists:sale_returns,id',
            'purchase_id' => 'nullable|exists:purchases,id',
            'purchase_return_id' => 'nullable|exists:purchase_returns,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        ProfitLoss::create($validated);

        return redirect()->route('profit_losses.index')->with('success', 'Profit/Loss created successfully!');
    }

    /**
     * Show the details of a specific profit loss.
     *
     * @param \App\Models\ProfitLoss $profitLoss
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitLoss $profitLoss)
    {
        return view('profit_losses.show', compact('profitLoss'));
    }

    /**
     * Show the form for editing a specific profit loss.
     *
     * @param \App\Models\ProfitLoss $profitLoss
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitLoss $profitLoss)
    {
        return view('profit_losses.edit', compact('profitLoss'));
    }

    /**
     * Update a specific profit loss in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProfitLoss $profitLoss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfitLoss $profitLoss)
    {
        $validated = $request->validate([
            'sale_id' => 'nullable|exists:sales,id',
            'sale_return_id' => 'nullable|exists:sale_returns,id',
            'purchase_id' => 'nullable|exists:purchases,id',
            'purchase_return_id' => 'nullable|exists:purchase_returns,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $profitLoss->update($validated);

        return redirect()->route('profit_losses.index')->with('success', 'Profit/Loss updated successfully!');
    }

    /**
     * Remove a specific profit loss from the database.
     *
     * @param \App\Models\ProfitLoss $profitLoss
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitLoss $profitLoss)
    {
        $profitLoss->delete();
        return redirect()->route('profit_losses.index')->with('success', 'Profit/Loss deleted successfully!');
    }
}

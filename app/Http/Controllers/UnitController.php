<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        return view('units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
            'operator' => 'nullable',
            'operator_value' => 'required|numeric',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
            'operator' => 'nullable',
            'operator_value' => 'required|numeric',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }
    public function destroy(Unit $unit)
    {
        if ($unit->products()->exists()) {
            return redirect()->route('units.index')->with('error', 'Cannot delete unit because it is associated with products.');
        }

        $unit->delete();
        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }

}

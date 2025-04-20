<?php
namespace App\Http\Controllers;

use App\Models\SaleReturn;
use App\Models\SaleReturnItem;
use Illuminate\Http\Request;

class SaleReturnController extends Controller
{
    public function index()
    {
        $returns = SaleReturn::with('items')->latest()->get();
        return view('sale_returns.index', compact('returns'));
    }

    public function create()
    {
        return view('sale_returns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reference' => 'required|unique:sale_returns',
            'customer' => 'required',
            'date' => 'required|date',
            'tax' => 'numeric',
            'discount' => 'numeric',
            'shipping' => 'numeric',
            'total_amount' => 'numeric',
            'status' => 'required',
            'items' => 'required|array',
        ]);

        $return = SaleReturn::create($data);

        foreach ($request->items as $item) {
            $item['sale_return_id'] = $return->id;
            SaleReturnItem::create($item);
        }

        return redirect()->route('sale_returns.index')->with('success', 'Return recorded.');
    }

    // Add show, edit, update, destroy if needed
}

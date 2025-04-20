<?php

namespace App\Http\Controllers;

use App\Models\ProfitLoss;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all profit and loss records
        $profitLosses = ProfitLoss::all();  // You can modify this query as per your need (e.g., filtering)

        // Return the view and pass the data
        return view('profit_loss.index', compact('profitLosses'));
    }

    // Other methods (store, create, etc.) remain as they are
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;

class StocksController extends Controller
{
    public function index()
    {
        $stocks = Stocks::all();

        return view('page.stocks.stocks', compact('stocks'));
    }

    public function stock($id)
    {
        $stock = Stocks::find($id);

        if (!$stock) {
            return view('404');
        }

        return view('page.stocks.stock', compact('stock'));
    }
}

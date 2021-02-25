<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;
use App\Models\CeoText;

class StocksController extends Controller
{
    public function index()
    {
        $stocks = Stocks::all();

        $seo = CeoText::where('type', '=', 'stocks')->first();

        return view('page.stocks.stocks', compact('stocks', 'seo'));
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

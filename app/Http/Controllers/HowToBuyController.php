<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\howToBuy;

class HowToBuyController extends Controller
{
    public function howToBuy()
    {
        $howToBuy = howToBuy::where('id', 1)->first();

        return view('page.howToBuy.howToBuy', compact('howToBuy'));
    }
}

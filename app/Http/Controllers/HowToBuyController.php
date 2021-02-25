<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\howToBuy;
use App\Models\CeoText;

class HowToBuyController extends Controller
{
    public function howToBuy()
    {
        $howToBuy = howToBuy::where('id', 1)->first();

        $seo = CeoText::where('type', '=', 'howToBuy')->first();

        return view('page.howToBuy.howToBuy', compact('howToBuy', 'seo'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\howToBuy;

class HowToBuyController extends AppBaseController
{
    public function howToBuy()
    {
        $howToBuy = howToBuy::where('id', 1)->first();

        return view('admin.howToBuy.howToBuy', compact('howToBuy'));
    }

    public function post_howToBuy(Request $request)
    {
        $input = $request->all();

        howToBuy::where('id', '=', 1)->update([
            'text_icon1' => $request->text1,
            'text_icon2' => $request->text2,
            'text_icon3' => $request->text3,
            'text_icon4' => $request->text4,
            'text' => $request->text5,
        ]);
        return back();
    }
}

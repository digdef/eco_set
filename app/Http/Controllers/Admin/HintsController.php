<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Hints;

class HintsController extends AppBaseController
{
    public function hints()
    {
        $hint = Hints::where('id', 1)->first();

        return view('admin.hints.hints', compact('hint'));
    }

    public function post_hints(Request $request)
    {
        Hints::where('id', '=', 1)->update([
            'septic_type' => $request->septic_type,
            'performance' => $request->performance,
            'persons' => $request->persons,
            'reset_type' => $request->reset_type,
            'inset_depth' => $request->inset_depth,
            'modification' => $request->modification,
            'type_of_drainage' => $request->type_of_drainage,
            'performance_prod' => $request->performance_prod,
            'salvo_discharge' => $request->salvo_discharge,
            'inset_depth_prod' => $request->inset_depth_prod,
            'dimensions' => $request->dimensions,
            'electricity_consumption' => $request->electricity_consumption,
            'weight' => $request->weight,
            'mounting' => $request->mounting,
            'reset_type_prod' => $request->reset_type_prod,
            'entrance_size' => $request->entrance_size,
            'useful_volume' => $request->useful_volume,
            'equipment' => $request->equipment,
            'elongate' => $request->elongate,
            'anchor' => $request->anchor
        ]);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ourWorks;

class OurWorksController extends Controller
{
    public function index()
    {
        $ourWorks = ourWorks::all();

        return view('page.ourWorks.ourWorks', compact('ourWorks'));
    }

    public function ourWork($id)
    {
        $ourWork = ourWorks::find($id);

        if (!$ourWork) {
            return view('404');
        }

        return view('page.ourWorks.ourWork', compact('ourWork'));
    }
}

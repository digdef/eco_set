<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;
use App\Models\Reviews;

class AboutController extends Controller
{
    public function about()
    {
        $about = about::where('id', 1)->first();
        $reviews = Reviews::all();

        return view('page.about.about', compact('about', 'reviews'));
    }
}

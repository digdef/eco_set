<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\CeoText;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Reviews::all();

        $seo = CeoText::where('type', '=', 'reviews')->first();

        return view('page.reviews.reviews', compact('reviews', 'seo'));
    }
}

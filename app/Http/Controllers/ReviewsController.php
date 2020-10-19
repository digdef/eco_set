<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Reviews::all();

        return view('page.reviews.reviews', compact('reviews'));
    }
}

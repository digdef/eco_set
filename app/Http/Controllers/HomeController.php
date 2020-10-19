<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Favorites;
use App\Models\MainCatalog;
use App\Models\Product;
use App\Models\Slider;
use App\Models\WhyUs;
use App\Models\CeoText;
use App\Models\Banners;
use App\Models\Category;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/admin');
//        return view('home');
    }

    public function index_page()
    {
        $products = Product::all();

        $catalog = MainCatalog::all();

        $products_top = collect([]);
        $products_advise = collect([]);
        $products_new = collect([]);
        $products_stock = collect([]);


        foreach ($catalog as $i) {
            if ($i->type == 1) {
                $product = Product::find($i->product);
                $products_top->push($product);
            } elseif ($i->type == 2) {
                $product = Product::find($i->product);
                $products_advise->push($product);
            } elseif ($i->type == 3) {
                $product = Product::find($i->product);
                $products_new->push($product);
            } elseif ($i->type == 4) {
                $product = Product::find($i->product);
                $products_stock->push($product);
            }
        }

        $slider = Slider::where('id', 1)->first();

        $favorites_user = collect([]);
        $comparisons_user = collect([]);
        $user = Cookie::get('name');

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }
        }

        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }
        }

        $why_us = WhyUs::where('id', 1)->first();
        $ceo_text = CeoText::where('id', 1)->first();
        $banners = Banners::where('id', 1)->first();

        return view('page.home.home',
            compact(
                'products_top',
                'products_advise',
                'products_new',
                'products_stock',
                'slider',
                'favorites_user',
                'comparisons_user',
                'why_us',
                'ceo_text',
                'banners'
            )
        );
    }

    public function map()
    {
        $categories = Category::all();

        return view('page.map.map', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Favorites;
use App\Models\MainCatalog;
use App\Models\Product;
use App\Models\Slider;
use App\Models\WhyUs;
use App\Models\CeoText;
use App\Models\CeoTextLink;
use App\Models\Banners;
use App\Models\Category;
use App\Models\StockToProducts;
use App\Models\Stocks;
use Cookie;

class IndexController extends Controller
{
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
        $stockToProducts = collect([]);
        $stock = collect([]);
        $user = Cookie::get('name');

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
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
        $links = CeoTextLink::where('id_ceo', 1)->get();
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
                'banners',
                'stockToProducts',
                'stock',
                'links'
            )
        );
    }

    public function map()
    {
        $categories = Category::all();

        return view('page.map.map', compact('categories'));
    }
}

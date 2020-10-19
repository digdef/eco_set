<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Favorites;
use App\Models\Comparison;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;
use Cookie;
use DB;

class FavoritesController extends Controller
{
    public function add_in_favorites(Request $request)
    {
        $id_product = $request->input('id_product');

        $user = Cookie::get('name');

        $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $id_product)->first();

        if ($favorites)
        {
            $id = $favorites->id;
            $favorites_del = Favorites::find($id);
            $favorites_del->delete();
            return 'del';
        }
        if (empty($errors))
        {
            $objFavorites = new Favorites();

            $objFavorites->create([
                'id_product' => $id_product,
                'user'       =>       $user
            ]);
        }

        return 'add';
    }

    public function favorites()
    {
        $user = Cookie::get('name');

        $favorites = Favorites::where('user', '=', $user)->get();

        $comparisons_user = collect([]);

        $products = collect([]);
        $stockToProducts = collect([]);
        $stock = collect([]);
        foreach($favorites as $i)
        {
            $product = Product::find($i->id_product);
            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }
            $products->push($product);
        }

        foreach ($products as $product) {
            $comparisons = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparisons) {
                $comparisons_user->push($product->id);
            }
        }

        return view('page.favorites.favorites', compact('favorites', 'products', 'comparisons_user', 'stockToProducts', 'stock'));
    }
}

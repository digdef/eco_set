<?php

namespace App\Http\Controllers;

use App;
use App\Models\Comparison;
use App\Models\Favorites;
use App\Models\Modification;
use App\Models\Category;
use App\Models\Product;
use App\Models\Hints;
use Cookie;
use DB;
use Illuminate\Http\Request;
use App\Models\CeoText;

class ComparisonController extends Controller
{
    public function comparison()
    {
        $hint = Hints::where('id', 1)->first();

        $user = Cookie::get('name');

        $comparisons = Comparison::where('user', '=', $user)->limit(3)->get();

        $products = collect([]);

        foreach ($comparisons as $i) {
            $product = Product::find($i->id_product);

            $products->push($product);
        }

        $favorites_user = collect([]);
        $category_type = collect([]);


        $comparisons_type1 = 0;
        $comparisons_type2 = 0;

        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }

            $modification = Modification::find($product->modification);

            $category = Category::find($modification->category);

            if ($category) {
                $category_type->push(array(
                    'product' => $product->id,
                    'type' => $category->type
                ));
                if ($category->type == 1) {
                    $comparisons_type1++;
                } elseif ($category->type == 2) {
                    $comparisons_type2++;
                }
            }
        }
        $seo = CeoText::where('type', '=', 'comparison')->first();

        return view('page.comparison.comparison', compact('comparisons', 'products', 'favorites_user', 'hint', 'category_type', 'comparisons_type1', 'comparisons_type2', 'seo'));
    }

    public function post_comparison(Request $request)
    {
        $id_product = $request->input('id_product');

        $user = Cookie::get('name');

        $comparisons = Comparison::where('user', '=', $user)->where('id_product', '=', $id_product)->first();

        if ($comparisons) {
            $id = $comparisons->id;
            $user = Comparison::find($id);
            $user->delete();
            return 'del';

        }
        if (empty($errors)) {
            $objComparison = new Comparison();

            $objComparison->create([
                'id_product' => $id_product,
                'category' => 1,
                'user' => $user
            ]);
        }

        return 'add';
    }
}

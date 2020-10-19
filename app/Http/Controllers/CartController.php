<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;
use Cookie;
use DB;

class CartController extends Controller
{
    public function add_in_cart(Request $request)
    {
        $id_product = $request->input('id_product');
        $number = $request->input('number');

        $user = Cookie::get('name');

        $carts = Cart::where('user', '=', $user)->where('id_product', '=', $id_product)->first();

        if ($carts)
        {
            $objCart = new Cart();

            $objCart->where('user', '=', $user)->where('id_product', '=', $id_product)->update([
                'number' => $carts->number + 1
            ]);

            return 'number';
        }
        if (empty($errors))
        {
            $objCart = new Cart();

            $objCart = $objCart->create([
                'id_product' => $id_product,
                'number'     =>     $number,
                'user'       =>       $user
            ]);
        }

        return 'add';
    }

    public function del_in_cart(Request $request)
    {
        $id_product = $request->input('id_product');
        $number = $request->input('number');

        $user = Cookie::get('name');

        $carts = Cart::where('user', '=', $user)->where('id_product', '=', $id_product)->first();

        if ($carts)
        {
            $id = $carts->id;
            $user = Cart::find($id);
            $user->delete();
            return 'del';

        }
        if (empty($errors))
        {
            $objCart = new Cart();

            $objCart = $objCart->create([
                'id_product' => $id_product,
                'number'     =>     $number,
                'user'       =>       $user
            ]);
        }

        return 'add';
    }

    public function cart_plus(Request $request)
    {
        $id_product = $request->input('id_product');
        $user = Cookie::get('name');

        $objCart = new Cart();

        $objCart->where('user', '=', $user)->where('id_product', '=', $id_product)->update([
            'number' => $request->input('quantity')
        ]);

        $carts = Cart::where('user', '=', $user)->get();

        $sum = 0;

        foreach($carts as $i)
        {
            $product = Product::find($i->id_product);

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();
            }

            if ($product->action) {
                if (isset($st) && isset($sTP)) {
                    $sum += ($product->price - ($product->price * ($st->percent/100)))*$i->number;
                } else {
                    $sum += $product->price*$i->number;
                }
            } else {
                $sum += $product->price*$i->number;
            }
        }

        return $sum;
    }

    public function cart()
    {
        $cookie_name = Cookie::get('name');

        $carts = Cart::where('user', '=', $cookie_name)->get();

        $sum = 0;

        $products = collect([]);

        $numbers = collect([]);

        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach($carts as $i)
        {
            $product = Product::find($i->id_product);

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }

            $numbers->push(['id' => $i->id_product, 'number' => $i->number]);

            $products->push($product);

            if ($product->action) {
                if (isset($st) && isset($sTP)) {
                    $sum += ($product->price - ($product->price * ($st->percent / 100))) * $i->number;
                } else {
                    $sum += $product->price*$i->number;
                }
            } else {
                $sum += $product->price*$i->number;
            }
        }

        $count_cart = count($carts) <= 0;

        return view('page.cart.cart', compact('carts', 'count_cart', 'sum', 'products', 'numbers', 'stockToProducts', 'stock'));
    }
}

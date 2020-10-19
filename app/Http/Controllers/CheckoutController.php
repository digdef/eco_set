<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\checkout_to_product;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;
use Cookie;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {

        $cookie_name = Cookie::get('name');

        $carts = Cart::where('user', '=', $cookie_name)->get();

        $sum = 0;

        $products = collect([]);

        $numbers = collect([]);

        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach ($carts as $i) {
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
                    $sum += $product->price * $i->number;
                }
            } else {
                $sum += $product->price * $i->number;
            }
        }

        $count_cart = count($carts) <= 0;

        return view('page.checkout.checkout', compact('carts', 'count_cart', 'sum', 'products', 'numbers', 'stockToProducts', 'stock'));
    }

    public function order(Request $request)
    {
        $user = Cookie::get('name');

        $input = $request->all();

        $objCheckout = new Checkout();

        $objCheckout = $objCheckout->create([
            'name' => $input['name'],
            'city' => $input['city'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'comment' => $input['comment'],
            'delivery' => $input['delivery'],
            'payment' => $input['payment'],
            'total' => $input['total']
        ]);

        $carts = Cart::where('user', '=', $user)->get();

        foreach ($carts as $cart)
        {
            $product = Product::find($cart->id_product);

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();
            }

            if ($product->action) {
                if (isset($st) && isset($sTP)) {
                    $price = ($product->price - ($product->price * ($st->percent / 100))) * $cart->number;
                } else {
                    $price = $product->price * $cart->number;
                }
            } else {
                $price = $product->price * $cart->number;
            }

            $obj_checkout_to_product = new checkout_to_product();

            $obj_checkout_to_product->create([
                'title' => $product->title,
                'price' => $price,
                'number' => $cart->number,
                'id_checkout' => $objCheckout->id
            ]);

            $id = $cart->id;
            $cart = Cart::find($id);
            $cart->delete();
        }

        return redirect('/thanks');
    }
}

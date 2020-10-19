<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\checkout_to_product;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;
use Cookie;
use Illuminate\Http\Request;

class CheckoutController extends AppBaseController
{
    public function checkout()
    {
        $checkouts = Checkout::all();

        return view('admin.checkout.checkout', compact('checkouts'));
    }

    public function edit($id)
    {
        $checkouts = checkout_to_product::all();

        return view('admin.checkout.edit', compact('checkouts', 'id'));
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $checkout_to_products = checkout_to_product::where('id_checkout', $input['id'])->get();

        foreach ($checkout_to_products as $checkout_to_product) {
            $checkout_to_product->delete($checkout_to_product->id);
        }

        $objStocks = Checkout::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }
}

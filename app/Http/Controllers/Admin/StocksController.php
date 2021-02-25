<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;

class StocksController extends AppBaseController
{
    public function index()
    {
        $stocks = Stocks::all();

        return view('admin.stocks.all', compact('stocks'));
    }

    public function create()
    {
        $products = Product::orderby('title', 'asc')->get();

        return view('admin.stocks.add', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::orderby('title', 'asc')->get();

        $stock = Stocks::find($id);

        $stockToProducts = StockToProducts::where('id_stock', $id)->get();

        $products_catalog = collect([]);

        foreach($stockToProducts as $i)
        {
            $product = Product::find($i->id_product);

            $products_catalog->push($product);
        }

        return view('admin.stocks.edit', compact('products', 'stock', 'products_catalog'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName);
        } else {
            $userfileFullName = $request->img;
        }

        $objStocks = new Stocks();

        $stock_id = $objStocks->create([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'percent' => $input['percent'],
            'finish' => $input['finish'],
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null
        ]);

        $objStockToProducts = new StockToProducts();

        $objProduct = new Product();

        if (isset($input['product'])) {
            foreach ($input['product'] as $product) {
                $objStockToProducts->create([
                    'id_product' => $product,
                    'id_stock' => $stock_id->id
                ]);

                $objProduct->where('id', '=', $product)->update([
                    'action' => 1
                ]);
            }
        }

        return redirect('/admin/stocks/all/');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName);
        } else {
            $userfileFullName = $request->in_img;
        }

        $objStocks = new Stocks();

        $stock_id = $objStocks->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'percent' => $input['percent'],
            'finish' => $input['finish'],
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null
        ]);


        $stockToProducts = StockToProducts::where('id_stock', $input['id'])->get();

        foreach ($stockToProducts as $stock) {
            $stock->delete($stock->id);
        }

        $objStockToProducts = new StockToProducts();

        $objProduct = new Product();

        if (isset($input['product'])) {
            foreach ($input['product'] as $product) {
                $objStockToProducts->create([
                    'id_product' => $product,
                    'id_stock' => $input['id']
                ]);

                $objProduct->where('id', '=', $product)->update([
                    'action' => 1
                ]);
            }
        }

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $stockToProducts = StockToProducts::where('id_stock', $input['id'])->get();

        foreach ($stockToProducts as $stock) {
            $stock->delete($stock->id);
        }

        $objStocks = Stocks::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }

}

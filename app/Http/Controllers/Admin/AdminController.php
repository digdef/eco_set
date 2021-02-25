<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App;
use App\Models\Slider;
use App\Models\Product;
use App\Models\WhyUs;
use App\Models\MainCatalog;
use App\Models\CeoText;
use App\Models\CeoTextLink;
use App\Models\Banners;
use DB;

class AdminController extends AppBaseController
{
    public function index($id)
    {
        $products = DB::table('products')
            ->where('modification', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.product.all', compact('products', 'id'));
    }

    public function slider()
    {
        $slider = Slider::where('id', 1)->first();

        return view('admin.home.slider', compact('slider'));
    }

    public function upload_img(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('img1')) {
            $file = $request->file('img1');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName);
        } else {
            $userfileFullName = $request->in_img1;
        }

        if ($request->hasFile('img2')) {
            $file = $request->file('img2');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName1 = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName1);
        } else {
            $userfileFullName1 = $request->in_img2;
        }

        if ($request->hasFile('img3')) {
            $file = $request->file('img3');


            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName2 = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName2);
        } else {
            $userfileFullName2 = $request->in_img3;
        }





        if ($request->hasFile('img4')) {
            $file = $request->file('img4');


            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName4 = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName4);
        } else {
            $userfileFullName4 = $request->in_img4;
        }

        if ($request->hasFile('img5')) {
            $file = $request->file('img5');


            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName5 = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName5);
        } else {
            $userfileFullName5 = $request->in_img5;
        }

        if ($request->hasFile('img6')) {
            $file = $request->file('img6');


            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName6 = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName6);
        } else {
            $userfileFullName6 = $request->in_img6;
        }





        Slider::where('id', '=', 1)->update([
            'title1' => $request->title1,
            'link1' => $request->link1,
            'img1' => $userfileFullName,
            'title2' => $request->title2,
            'link2' => $request->link2,
            'img2' => $userfileFullName1,
            'title3' => $request->title3,
            'link3' => $request->link3,
            'img3' => $userfileFullName2,
            'title4' => $request->title4,
            'link4' => $request->link4,
            'img4' => $userfileFullName4,
            'title5' => $request->title5,
            'link5' => $request->link5,
            'img5' => $userfileFullName5,
            'title6' => $request->title6,
            'link6' => $request->link6,
            'img6' => $userfileFullName6,
        ]);

        return back();
    }

    public function top()
    {
        $products = Product::all();

        $catalog = MainCatalog::where('type', 1)->get();

        $products_catalog = collect([]);


        foreach($catalog as $i)
        {
            $product = Product::find($i->product);

            $products_catalog->push($product);
        }


        return view('admin.home.top', compact('products', 'products_catalog'));
    }

    public function advise()
    {
        $products = Product::all();

        $catalog = MainCatalog::where('type', 2)->get();

        $products_catalog = collect([]);


        foreach($catalog as $i)
        {
            $product = Product::find($i->product);

            $products_catalog->push($product);
        }


        return view('admin.home.advise', compact('products', 'products_catalog'));
    }

    public function new()
    {
        $products = Product::all();

        $catalog = MainCatalog::where('type', 3)->get();

        $products_catalog = collect([]);


        foreach($catalog as $i)
        {
            $product = Product::find($i->product);

            $products_catalog->push($product);
        }


        return view('admin.home.new', compact('products', 'products_catalog'));
    }

    public function stock()
    {
        $products = Product::all();

        $catalog = MainCatalog::where('type', 4)->get();

        $products_catalog = collect([]);


        foreach($catalog as $i)
        {
            $product = Product::find($i->product);

            $products_catalog->push($product);
        }

        return view('admin.home.stock', compact('products', 'products_catalog'));
    }

    public function top_update(Request $request)
    {
        $input = $request->all();

        $catalogs = MainCatalog::where('type', $input['type'])->get();

        foreach ($catalogs as $catalog) {
            $catalog->delete($catalog->id);
        }


        $objProduct = new MainCatalog();

        if (isset($input['product'])) {
            foreach ($input['product'] as $product) {
                $objProduct->create([
                    'product' => $product,
                    'type' => $input['type']
                ]);
            }
        }

        return back();
    }

    public function why_us()
    {
        $why_us = WhyUs::where('id', 1)->first();

        return view('admin.home.why_us', compact('why_us'));
    }

    public function post_why_us(Request $request)
    {
        WhyUs::where('id', '=', 1)->update([
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'description4' => $request->description4
        ]);

        return back();
    }

    public function ceo_text()
    {
        $ceo_text = CeoText::where('id', 1)->first();

        $links = CeoTextLink::where('id_ceo', 1)->get();

        return view('admin.home.ceo-text', compact('ceo_text', 'links'));
    }

    public function post_ceo_text(Request $request)
    {
        $input = $request->all();

        CeoText::where('id', '=', 1)->update([
            'text1' => $request->text1,
            'text2' => $request->text2,
            'text3' => $request->text3,
            'text4' => $request->text4,
            'text5' => $request->text5,
            'title1' => $request->title1,
            'title2' => $request->title3,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);

        $links = CeoTextLink::where('id_ceo', 1)->get();

        foreach ($links as $link) {
            $link->delete($link->id);
        }

        $links = new CeoTextLink();

        if (isset($input['title_link'])) {
            for ($i = 0; $i < count($input['title_link']); $i++) {
                $links->create([
                    'title' => $input['title_link'][$i],
                    'link' => $input['link'][$i],
                    'id_ceo' => 1
                ]);
            }
        }

        return back();
    }

    public function banners()
    {
        $banners = Banners::where('id', 1)->first();

        return view('admin.home.banners', compact('banners'));
    }

    public function post_banners(Request $request)
    {
        Banners::where('id', '=', 1)->update([
            'link1' => $request->link1,
            'link2' => $request->link2,
            'link3' => $request->link3,
            'title1' => $request->title1,
            'title2' => $request->title3,
            'title3' => $request->title3,
            'img1' => $request->img1,
            'img2' => $request->img2,
            'img3' => $request->img3
        ]);

        return back();
    }
}

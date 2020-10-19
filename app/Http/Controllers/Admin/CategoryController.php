<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App;
use App\Models\Modification;
use App\Models\Category;
use App\Models\Product;
use App\Models\CeoText;
use App\Models\CeoTextLink;
use DB;

class CategoryController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categories = Category
            ::where('type', $id)
            ->orderBy('id', 'desc')
            ->get();

        if ($id == 3) {
            return redirect('admin/product_water');
        }

        return view('admin.category.all', compact('categories', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.category.add', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $objCategory = new Category();

        $objCategory = $objCategory->create([
            'title' => $input['title'],
            'type' => $input['cat']
        ]);

        CeoText::create([
            'text1' => $request->text1,
            'text2' => $request->text2,
            'text3' => $request->text3,
            'text4' => $request->text4,
            'text5' => $request->text5,
            'title1' => $request->title1,
            'title2' => $request->title3,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'id_content' => $objCategory->id
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $ceo_text = CeoText::where('id_content', $id)->first();

        return view('admin.category.edit', compact('category', 'ceo_text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $input = $request->all();

        $objCategory = new Category();

        $objCategory->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
        ]);

        if (CeoText::where('id_content', '=', $input['id'])->first())
        {
            CeoText::where('id_content', $input['id'])->update([
                'text1' => $request->text1,
                'text2' => $request->text2,
                'text3' => $request->text3,
                'text4' => $request->text4,
                'text5' => $request->text5,
                'title1' => $request->title1,
                'title2' => $request->title3,
                'title3' => $request->title3,
                'title4' => $request->title4
            ]);
        } else {
            CeoText::create([
                'text1' => $request->text1,
                'text2' => $request->text2,
                'text3' => $request->text3,
                'text4' => $request->text4,
                'text5' => $request->text5,
                'title1' => $request->title1,
                'title2' => $request->title3,
                'title3' => $request->title3,
                'title4' => $request->title4,
                'id_content' => $input['id']
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = $request->all();

        $category = Category::find($input['id']);

        $modifications = Modification::where('category', $category->id)->get();

        foreach ($modifications as $modification) {
            $products = Product::where('modification', $modification->id)
                ->get();

            foreach ($products as $product) {
                $product->delete($product->id);
            }

            $modification->delete($modification->id);
        }

        $category->delete($input['id']);

        return back();
    }





    public function category_ceo_text($id)
    {
        if ($id == 1) {
            $cat = 'septic';
        } elseif ($id == 2) {
            $cat = 'cellars';
        } elseif ($id == 4) {
            $cat = 'accessories';
        }

        $ceo_text = CeoText::where('type', $cat)->first();

        $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();

        return view('admin.category.ceo-text', compact('ceo_text', 'links', 'id'));
    }

    public function category_post_ceo_text(Request $request, $id)
    {
        if ($id == 1) {
            $cat = 'septic';
        } elseif ($id == 2) {
            $cat = 'cellars';
        } elseif ($id == 4) {
            $cat = 'accessories';
        }

        $input = $request->all();

        CeoText::where('type', '=', $cat)->update([
            'text1' => $request->text1 ?? '',
            'text2' => $request->text2 ?? '',
            'text3' => $request->text3 ?? '',
            'text4' => $request->text4 ?? '',
            'text5' => $request->text5 ?? '',
            'title1' => $request->title1 ?? '',
            'title2' => $request->title3 ?? '',
            'title3' => $request->title3 ?? '',
            'title4' => $request->title4 ?? '',
            'meta_title' => $input['meta_title'] ?? '',
            'meta_description' => $input['meta_description'] ?? ''
        ]);

        $ceo_text = CeoText::where('type', $cat)->first();

        $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();

        foreach ($links as $link) {
            $link->delete($link->id);
        }

        $links = new CeoTextLink();

        if (isset($input['title_link'])) {
            for ($i = 0; $i < count($input['title_link']); $i++) {
                $links->create([
                    'title' => $input['title_link'][$i],
                    'link' => $input['link'][$i],
                    'id_ceo' => $ceo_text->id
                ]);
            }
        }

        return back();
    }



}

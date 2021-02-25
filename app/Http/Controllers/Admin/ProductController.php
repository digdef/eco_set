<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App;
use App\Models\Product;
use App\Models\Modification;
use App\Models\Category;
use App\Models\CeoText;
use App\Models\CeoTextLink;
use DB;

class ProductController extends AppBaseController
{
    public function index($id)
    {
        $products = DB::table('products')
            ->where('modification', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.product.all', compact('products', 'id'));
    }

    public function create($category)
    {
        $modification = Modification::find($category);

        $category = Category::find($modification->category);

        if ($category->type == 2) {
            return view('admin.product.add_cellars', compact('category', 'modification'));
        }

        return view('admin.product.add', compact('category', 'modification'));

    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

        $modification = Modification::find($product->modification);

        $ceo_text = CeoText::where('id_content', $id)->where('type', NULL)->first();

        if (isset($ceo_text)) {
            $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();
        } else {
            $links =  collect([]);
        }

        $category = Category::find($modification->category);

        if ($category->type == 2) {
            return view('admin.product.edit_cellars', compact('product', 'modification', 'ceo_text', 'links'));
        }

        return view('admin.product.edit', compact('product', 'modification', 'ceo_text', 'links'));
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

        if ($request->hasFile('wiring_diagram')) {
            $file1 = $request->file('wiring_diagram');

            $name = $file1->getClientOriginalName();

            $userfileName = time();

            $userPdfFullName1 = $userfileName . '-' . $name;

            $file1->move(public_path() . '/pdf/', $userPdfFullName1);
        } else {
            $userPdfFullName1 = $request->wiring_diagram;
        }

        if ($request->hasFile('technical_certificate')) {
            $file2 = $request->file('technical_certificate');

            $name = $file2->getClientOriginalName();

            $userfileName = time();

            $userPdfFullName2 = $userfileName . '-' . $name;

            $file2->move(public_path() . '/pdf/', $userPdfFullName2);
        } else {
            $userPdfFullName2 = $request->technical_certificate;
        }

        if (isset($input['action'])) {
            $action = $input['action'];
        } else {
            $action = 0;
        }

        if (isset($input['new'])) {
            $new = $input['new'];
        } else {
            $new = 0;
        }

        if (isset($input['top'])) {
            $top = $input['top'];
        } else {
            $top = 0;
        }

        if (isset($input['advise'])) {
            $advise = $input['advise'];
        } else {
            $advise = 0;
        }

        $modification = Modification::find($input['modification']);

        $category = Category::find($input['cat']);

        $objProduct = new Product();

        $objProduct = $objProduct->create([
            'title' => $input['title'] ?? null,
            'header_note' => $input['header_note'] ?? null,
            'img' => $userfileFullName ?? null,
            'wiring_diagram' => $userPdfFullName1,
            'technical_certificate' => $userPdfFullName2,
            'price' => $input['price'] ?? null,
            'thumbnail' => $input['thumbnail'] ?? null,
            'description' => $input['description'] ?? null,
            'insert_depth' => $input['insert_depth'] ?? null,
            'reset_type' => $input['reset_type'] ?? null,
            'modification' => $input['modification'] ?? null,
            'type_of_drainage' => $input['type_of_drainage'] ?? null,
            'performance' => $input['performance'] ?? null,
            'salvo_discharge' => $input['salvo_discharge'] ?? null,
            'electricity_consumption' => $input['electricity_consumption'] ?? null,
            'weight' => $input['weight'] ?? null,
            'mounting' => $input['mounting'] ?? null,
            'dimensions' => $input['dimensions'] ?? null,
            'sink' => $input['sink'] ?? null,
            'bath' => $input['bath'] ?? null,
            'toilet' => $input['toilet'] ?? null,
            'washer' => $input['washer'] ?? null,
            'shower' => $input['shower'] ?? null,
            'action' => $action ?? null,
            'new' => $new ?? null,
            'top' => $top ?? null,
            'advise' => $advise ?? null,
            'category' => $category->type ?? null,
            'persons' => $input['persons'] ?? null,
            'type_of_shell' => $input['type_of_shell'] ?? null,
            'type_septic' => $input['type_septic'] ?? null,
            'manufacturer' => $modification->category ?? null,
            'elongate' => $input['elongate'] ?? null,
            'anchor' => $input['anchor'] ?? null,
            'equipment' => $input['equipment'] ?? null,
            'entrance_size' => $input['entrance_size'] ?? null,
            'useful_volume' => $input['useful_volume'] ?? null,
            'pinterest' => $input['pinterest'] ?? null,
            'url' => $input['url'] ?? null,
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null,
            'youtube' => $input['youtube'] ?? null,
            'youtube_description' => $input['youtube_description'] ?? null
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
            'id_content' => $objProduct->id
        ]);

        return back();
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

        if ($request->hasFile('wiring_diagram')) {
            $file1 = $request->file('wiring_diagram');

            $name = $file1->getClientOriginalName();

            $userfileName = time();

            $userPdfFullName1 = $userfileName . '-' . $name;

            $file1->move(public_path() . '/pdf/', $userPdfFullName1);
        } elseif ($request->in_wiring_diagram) {
            $userPdfFullName1 = $request->in_wiring_diagram;
        } else {
            $userPdfFullName1 = null;
        }

        if ($request->hasFile('technical_certificate')) {
            $file2 = $request->file('technical_certificate');

            $name = $file2->getClientOriginalName();

            $userfileName = time();

            $userPdfFullName2 = $userfileName . '-' . $name;

            $file2->move(public_path() . '/pdf/', $userPdfFullName2);
        } elseif ($request->in_technical_certificate) {
            $userPdfFullName2 = $request->in_technical_certificate;
        } else {
            $userPdfFullName2 = null;
        }

        if (isset($input['action'])) {
            $action = $input['action'];
        } else {
            $action = 0;
        }

        if (isset($input['new'])) {
            $new = $input['new'];
        } else {
            $new = 0;
        }

        if (isset($input['top'])) {
            $top = $input['top'];
        } else {
            $top = 0;
        }

        if (isset($input['advise'])) {
            $advise = $input['advise'];
        } else {
            $advise = 0;
        }

        $category = Category::find($input['cat']);

        $modification = Modification::find($input['modification']);

        $objProduct = new Product();

        $objProduct = $objProduct->where('id', '=', $input['id'])->update([
            'title' => $input['title'] ?? null,
            'header_note' => $input['header_note'] ?? null,
            'img' => $userfileFullName ?? null,
            'wiring_diagram' => $userPdfFullName1,
            'technical_certificate' => $userPdfFullName2,
            'price' => $input['price'] ?? null,
            'thumbnail' => $input['thumbnail'] ?? null,
            'description' => $input['description'] ?? null,
            'insert_depth' => $input['insert_depth'] ?? null,
            'reset_type' => $input['reset_type'] ?? null,
            'modification' => $input['modification'] ?? null,
            'type_of_drainage' => $input['type_of_drainage'] ?? null,
            'performance' => $input['performance'] ?? null,
            'salvo_discharge' => $input['salvo_discharge'] ?? null,
            'electricity_consumption' => $input['electricity_consumption'] ?? null,
            'weight' => $input['weight'] ?? null,
            'mounting' => $input['mounting'] ?? null,
            'dimensions' => $input['dimensions'] ?? null,
            'sink' => $input['sink'] ?? null,
            'bath' => $input['bath'] ?? null,
            'toilet' => $input['toilet'] ?? null,
            'washer' => $input['washer'] ?? null,
            'shower' => $input['shower'] ?? null,
            'action' => $action ?? null,
            'new' => $new ?? null,
            'top' => $top ?? null,
            'advise' => $advise ?? null,
            'category' => $category->type ?? null,
            'persons' => $input['persons'] ?? null,
            'type_of_shell' => $input['type_of_shell'] ?? null,
            'type_septic' => $input['type_septic'] ?? null,
            'manufacturer' => $modification->category ?? null,
            'elongate' => $input['elongate'] ?? null,
            'anchor' => $input['anchor'] ?? null,
            'equipment' => $input['equipment'] ?? null,
            'entrance_size' => $input['entrance_size'] ?? null,
            'useful_volume' => $input['useful_volume'] ?? null,
            'pinterest' => $input['pinterest'] ?? null,
            'url' => $input['url'] ?? null,
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null,
            'youtube' => $input['youtube'] ?? null,
            'youtube_description' => $input['youtube_description'] ?? null
        ]);

        if (CeoText::where('id_content', '=', $input['id'])->where('type', NULL)->first())
        {
            CeoText::where('id_content', $input['id'])->where('type', NULL)->update([
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


        $CeoText = CeoText::where('id_content', '=', $input['id'])->where('type', NULL)->first();

        $links = CeoTextLink::where('id_ceo', $CeoText->id)->get();

        foreach ($links as $link) {
            $link->delete($link->id);
        }

        $links = new CeoTextLink();

        if (isset($input['title_link'])) {
            for ($i = 0; $i < count($input['title_link']); $i++) {
                $links->create([
                    'title' => $input['title_link'][$i],
                    'link' => $input['link'][$i],
                    'id_ceo' => $CeoText->id
                ]);
            }
        }



        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $product = Product::find($input['id']);

        $product->delete($input['id']);

        return back();
    }

    public function product_water()
    {
        $ceo_text = CeoText::where('id', 2)->first();

        return view('admin.product.ceo-text', compact('ceo_text'));
    }

    public function update_product_water (Request $request)
    {
        CeoText::where('id', '=', 2)->update([
            'text_water' => $request->text_water,
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

        return back();
    }
}

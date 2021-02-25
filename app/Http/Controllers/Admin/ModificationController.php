<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App;
use App\Models\Modification;
use App\Models\Product;
use App\Models\CeoText;
use DB;

class ModificationController extends AppBaseController
{
    public function index($id)
    {
        $modifications = DB::table('modifications')
            ->where('category', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.modification.all', compact('modifications', 'id'));
    }

    public function create($category)
    {
        return view('admin.modification.add', compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $modification = Modification::find($id);

        return view('admin.modification.edit', compact('modification'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $objModification = new Modification();

        $objModification->create([
            'title' => $input['title'],
            'category' => $input['cat']
        ]);

        return back();
    }

    public function update(Request $request)
    {

        $input = $request->all();

        $objModification = new Modification();

        $objModification->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $modification = Modification::find($input['id']);

        $products = Product::where('modification', $modification->id)
            ->get();

        foreach ($products as $product) {
            $product->delete($product->id);
        }

        $modification->delete($input['id']);

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

        $ceo_text = CeoText::where('id_modification', $id)->first();

//        $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();

        return view('admin.modification.ceo-text', compact('ceo_text', 'id'));
    }

    public function category_post_ceo_text(Request $request, $id)
    {
        $input = $request->all();

        $ceo_text = CeoText::where('id_modification', $id)->first();

        if ($ceo_text) {
            CeoText::where('id_modification', '=', $id)->update([
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
        } else {
            CeoText::create([
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
                'meta_description' => $input['meta_description'] ?? '',
                'id_modification' => $id
            ]);
        }



//        $ceo_text = CeoText::where('type', $cat)->first();
//
//        $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();
//
//        foreach ($links as $link) {
//            $link->delete($link->id);
//        }
//
//        $links = new CeoTextLink();
//
//        if (isset($input['title_link'])) {
//            for ($i = 0; $i < count($input['title_link']); $i++) {
//                $links->create([
//                    'title' => $input['title_link'][$i],
//                    'link' => $input['link'][$i],
//                    'id_ceo' => $ceo_text->id
//                ]);
//            }
//        }

        return back();
    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CeoText;
use App\Models\CeoTextLink;

class SeoController extends AppBaseController
{
    public function index()
    {
        $seo = CeoText::where('type', '!=', null)->orderby('type')->get();

        return view('admin.seo.all', compact('seo'));
    }

    public function show($type)
    {
        $seo = CeoText::where('type', '=', $type)->first();

        return view('admin.seo.edit', compact('seo'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        CeoText::where('id', '=', $id)->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'text1' => $request->text1 ?? '',
            'text2' => $request->text2 ?? '',
            'text3' => $request->text3 ?? '',
            'text4' => $request->text4 ?? '',
            'text5' => $request->text5 ?? '',
            'title1' => $request->title1 ?? '',
            'title2' => $request->title3 ?? '',
            'title3' => $request->title3 ?? '',
            'title4' => $request->title4 ?? ''
        ]);

        return back();
    }

    public function destroy($id)
    {
        //
    }
}

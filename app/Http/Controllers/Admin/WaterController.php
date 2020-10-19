<?php

namespace App\Http\Controllers\Admin;

use App\Models\Water;
use Illuminate\Http\Request;

class WaterController extends AppBaseController
{
    public function index()
    {
        $articles = Water::all();

        return view('admin.water.all', compact('articles'));
    }

    public function create()
    {
        return view('admin.water.add');
    }

    public function edit($id)
    {
        $article = Water::find($id);

        return view('admin.water.edit', compact('article'));
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

        $objArticle = new Water();

        $objArticle->create([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'pinterest' => $input['pinterest']
        ]);


        return redirect('/admin/water/all/');
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

        $objArticle = new Water();

        $objArticle->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'pinterest' => $input['pinterest']
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $objStocks = Water::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\article;

class ArticleController extends AppBaseController
{
    public function index()
    {
        $articles = article::all();

        return view('admin.article.all', compact('articles', 'id'));
    }

    public function create()
    {
        return view('admin.article.add');
    }

    public function edit($id)
    {
        $article = article::find($id);

        return view('admin.article.edit', compact( 'article'));
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

        $objArticle = new article();

        $objArticle->create([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'pinterest' => $input['pinterest']
        ]);


        return redirect('/admin/article/all/');
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

        $objArticle = new article();

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

        $objStocks = article::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }}

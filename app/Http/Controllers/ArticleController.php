<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::all();

        return view('page.article.articles', compact('articles'));
    }

    public function article($id)
    {
        $article = article::find($id);

        if (!$article) {
            return view('404');
        }

        return view('page.article.article', compact('article'));
    }
}

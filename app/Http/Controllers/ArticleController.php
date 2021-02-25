<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\CeoText;

class ArticleController extends Controller
{
    const ARTICLE_DESCRIPTION_TEMPLATE = '{DB_DESCRIPTION}. У нас можно купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков.';
    public function index()
    {
        $articles = article::all();
        $seo = CeoText::where('type', '=', 'articles')->first();

        return view('page.article.articles', compact('articles', 'seo'));
    }

    public function article($id)
    {
        $article = article::find($id);

        if (!$article) {
            return view('404');
        }
        $seo = new CeoText();
        $seo->meta_title = $article->title;
        $seo->meta_description = $this->getTemplatedString(
            $article->title,
            self::ARTICLE_DESCRIPTION_TEMPLATE,
            '{DB_DESCRIPTION}'
        );
        return view('page.article.article', compact('article', 'seo'));
    }
}

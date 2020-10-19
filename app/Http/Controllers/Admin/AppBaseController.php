<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Work;
use InfyOm\Generator\Utils\ResponseUtil;
use App\Http\Controllers\Controller as LaravelController;
use Response;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends LaravelController
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sitemap_xml_generator()
    {
        $sitemap = Sitemap::create();
        $root_pages_urls = array(
            route("index"),
            route('about'),
            route('services'),
            route('blog'),
            route('price'),
            route('shipping'),
            route('payment-shipping'),
            route('portfolio'),
            route('contacts'),
            route('catalog'),
            route('spasibo'),
            route('sitemap')
        );
        //add root pages
        foreach ($root_pages_urls as $url){
            $sitemap->add(
                Url::create($url)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }
        //add usual sitemap pages
        foreach (Service::get() as $page){
            $sitemap->add(
                Url::create(route('services.item', $page->link))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//services urls
        foreach (Article::get() as $page){
            $sitemap->add(
                Url::create(route('blog.article', [$page['category']['link'], $page->link]))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//blog urls
        $products = Product::with('category')->where('is_active', 1)->whereHas('category', function($query) {
            $query->where('is_active', 1);
        })->get();
        foreach ($products as $page){
            $sitemap->add(
                Url::create(route('catalog.product', [$page['category']['link'], $page->link]))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//products urls
        $cats = ProductCategory::where('is_active', 1)->get();
        foreach ($cats as $page){
            $sitemap->add(
                Url::create(route('catalog.category', $page['link']))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//categories urls
        $works = Work::where('is_active', 1)->get();
        foreach ($works as $page){
            $sitemap->add(
                Url::create(route('portfolio.item', $page['link']))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//portfolio urls
        $article_categories = ArticleCategory::where('is_active', 1)->get();
        foreach ($article_categories as $page){
            $sitemap->add(
                Url::create(route('blog.category', $page['link']))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//portfolio urls
        $sitemap->writeToFile(base_path('public/sitemap.xml' ));
        if(!file_exists(base_path('public/sitemap.xml'))){
            return response('Bad request', 404);
        }
        else{
            return response('map exists', 200);
        }
    }
}

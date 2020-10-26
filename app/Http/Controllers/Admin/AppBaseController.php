<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Stocks;
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
            route('main_page'),
            route('actions_page'),
            route('services_page'),
            route('articles_page'),
            route('portfolio_page'),
            route('reviews_page'),
            route('how2buy_page'),
            route('about4s_page'),
            route('contacts_page'),
            route('water_page'),
        );
        //add root pages
        foreach ($root_pages_urls as $url){
            $sitemap->add(
                Url::create($url)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(1)
            );
        }
        //add usual sitemap pages
        foreach (Stocks::all() as $page){
            $sitemap->add(
                Url::create(route('actions_page.item', $page->id))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//actions actions urls
        foreach (Category::all() as $page){
            $cat_name = '';
            $route_name = 'category_page_common';
            switch ($page->type){
                case 1:
                    $cat_name = 'septic';
                    break;
                case 2:
                    $cat_name = 'cellars';
                    break;
                case 3:
                    $route_name = 'category_page_water';
                    $cat_name = 'water';
                    break;
                case 4:
                    $cat_name = 'accessories';
                    break;
            }
            $sitemap->add(
                Url::create(route($route_name, $cat_name))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
            $sitemap->add(
                Url::create(route('category_price_page', $page->type))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//catalog category to catalog and price urls
        foreach (Product::all() as $product){
            $sitemap->add(
                Url::create(route('product', $product->id))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0)
            );
        }//catalog product urls
        $sitemap_path = base_path('public/sitemap.xml');
        $sitemap->writeToFile($sitemap_path);
        if(!file_exists(base_path('public/sitemap.xml'))){
            return response('Bad request', 404);
        }
        else{
            //force fix map nodes http to https
            $sitemap_file_handler = fopen($sitemap_path, 'r');
            $sitemap_corrected = str_replace('<loc>http://', '<loc>https://', fread($sitemap_file_handler, filesize($sitemap_path)));
            fclose($sitemap_file_handler);
            $sitemap_file_handler = fopen($sitemap_path, 'w+');
            fwrite($sitemap_file_handler, $sitemap_corrected);
            fclose($sitemap_file_handler);
            return response('map exists', 200);
        }
    }
}

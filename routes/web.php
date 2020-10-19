<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('clear', function () {
    Log::debug('CLEARED');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
});

Route::get('/', 'IndexController@index_page');

Route::get('index.html', function () {
    return redirect('/');
});





Route::get('css', function () {
    return redirect('/');
});

Route::get('images', function () {
    return redirect('/');

});

Route::get('index.html', function () {
    return redirect('/');
});

Route::get('index.html', function () {
    return redirect('/');
});








Route::get('thanks', function () {
    return view('page.thanks.thanks');
});

Route::get('catalog/{cat}', 'ProductController@catalog');

//Route::get('catalog/mod/{mod}', 'ProductController@catalog_mod');


Route::get('price/{cat}', 'ProductController@price_list');
Route::get('price/cat/{mod}', 'ProductController@price_list_modification');


Route::get('product/{url}', 'ProductController@product')->name('product');


Route::get('stocks/', 'StocksController@index');
Route::get('stock/{id}', 'StocksController@stock');


Route::get('search/', 'ProductController@search');

Route::get('map/', 'IndexController@map');


Route::get('services/', 'ServicesController@index');
Route::get('service/{id}', 'ServicesController@service');




Route::get('waters/', 'ProductController@water');
Route::get('water/{id}', 'ProductController@water_page');




Route::get('ourWorks/', 'OurWorksController@index');
Route::get('ourWork/{id}', 'OurWorksController@ourWork');


Route::get('articles/', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@article');


Route::get('reviews/', 'ReviewsController@index');

Route::get('howToBuy/', 'HowToBuyController@howToBuy');

Route::get('about/', 'AboutController@about');


Route::get('contacts', 'ContactsController@index');

Route::get('favorites', 'FavoritesController@favorites');

Route::post('add-in-favorites', 'FavoritesController@add_in_favorites');

Route::post('notifications', 'NotificationsController@notifications');

Route::get('cart', 'CartController@cart');

Route::post('add-in-cart', 'CartController@add_in_cart');

Route::post('del-in-cart', 'CartController@del_in_cart');


Route::post('cart-plus', 'CartController@cart_plus');



Route::get('checkout', 'CheckoutController@checkout');
Route::post('checkout', 'CheckoutController@order');



Route::get('comparison', 'ComparisonController@comparison');

Route::post('post-comparison', 'ComparisonController@post_comparison');



Route::post('filter-sorting', 'ProductController@filter');

Route::get('price-filter/{cat}', 'ProductController@filter');
Route::get('title-filter/{cat}', 'ProductController@title_filter');


Route::get('filter/{cat}', 'ProductController@filter');


Route::post('download/{filename}', 'ProductController@download')->name('download');



Route::middleware(['admin'])->group(function () {

    Route::get('admin', function () {
        return view('admin.home.home');
    });

    Route::get('admin/price', function () {
        return view('admin.home.price');
    });

    Route::get('admin/top', 'Admin\AdminController@top')->name('top');
    Route::post('top', 'Admin\AdminController@top_update');


    Route::get('admin/why_us', 'Admin\AdminController@why_us')->name('why_us');
    Route::post('admin/why_us', 'Admin\AdminController@post_why_us')->name('post_why_us');


    Route::get('admin/hints', 'Admin\HintsController@hints')->name('hints');
    Route::post('admin/hints', 'Admin\HintsController@post_hints')->name('post_hints');


    Route::get('admin/howToBuy', 'Admin\HowToBuyController@howToBuy')->name('howToBuy');
    Route::post('admin/howToBuy', 'Admin\HowToBuyController@post_howToBuy')->name('post_howToBuy');


    Route::get('admin/about', 'Admin\AboutController@about')->name('about');
    Route::post('admin/about', 'Admin\AboutController@post_about')->name('post_about');


    Route::get('admin/ceo-text', 'Admin\AdminController@ceo_text')->name('ceo_text');
    Route::post('admin/ceo-text', 'Admin\AdminController@post_ceo_text')->name('post_ceo_text');


    Route::get('admin/banners', 'Admin\AdminController@banners')->name('banners');
    Route::post('admin/banners', 'Admin\AdminController@post_banners')->name('post_banners');


    Route::get('admin/stock', 'Admin\AdminController@stock')->name('stock');

    Route::get('admin/advise', 'Admin\AdminController@advise')->name('advise');

    Route::get('admin/new', 'Admin\AdminController@new')->name('new');

    Route::get('admin/slider', 'Admin\AdminController@slider')->name('slider');

    Route::post('upload-img', 'Admin\AdminController@upload_img')->name('upload_img');


    Route::get('admin/category/all/{id}', 'Admin\CategoryController@index')->name('all_category');
    Route::get('admin/category/{category}/add', 'Admin\CategoryController@create');
    Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('edit_category');

    Route::post('admin/category/add', 'Admin\CategoryController@store')->name('add_category');
    Route::post('admin/category/update', 'Admin\CategoryController@update')->name('update_category');
    Route::post('admin/category/delete', 'Admin\CategoryController@destroy')->name('delete_category');


    Route::get('admin/category/{id}/ceo', 'Admin\CategoryController@category_ceo_text')->name('category_ceo_text');
    Route::post('admin/category/{id}/ceo', 'Admin\CategoryController@category_post_ceo_text')->name('category_post_ceo_text');


    Route::get('admin/product/{category}/add', 'Admin\ProductController@create');
    Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('edit_product');
    Route::get('admin/product/all/{id}', 'Admin\ProductController@index')->name('all_product');

    Route::post('admin/product/add', 'Admin\ProductController@store')->name('add_product');
    Route::post('admin/product/update', 'Admin\ProductController@update')->name('update_product');
    Route::post('admin/product/delete', 'Admin\ProductController@delete')->name('delete_product');


    Route::get('admin/product_water', 'Admin\ProductController@product_water')->name('product_water');
    Route::post('admin/product_water', 'Admin\ProductController@update_product_water')->name('update_product_water');


    Route::get('admin/modification/{category}/add', 'Admin\ModificationController@create');
    Route::get('admin/modification/all/{id}', 'Admin\ModificationController@index')->name('all_modification');
    Route::get('admin/modification/edit/{id}', 'Admin\ModificationController@edit')->name('edit_modification');

    Route::post('admin/modification/add', 'Admin\ModificationController@store')->name('add_modification');
    Route::post('admin/modification/update', 'Admin\ModificationController@update')->name('update_modification');
    Route::post('admin/modification/delete', 'Admin\ModificationController@delete')->name('delete_modification');


    Route::get('admin/stocks/add', 'Admin\StocksController@create');
    Route::get('admin/stocks/edit/{id}', 'Admin\StocksController@edit')->name('edit_stocks');
    Route::get('admin/stocks/all/', 'Admin\StocksController@index')->name('stocks');

    Route::post('admin/stocks/add', 'Admin\StocksController@store')->name('add_stocks');
    Route::post('admin/stocks/update', 'Admin\StocksController@update')->name('update_stocks');
    Route::post('admin/stocks/delete', 'Admin\StocksController@delete')->name('delete_stocks');


    Route::get('admin/services/add', 'Admin\ServicesController@create');
    Route::get('admin/services/edit/{id}', 'Admin\ServicesController@edit')->name('edit_services');
    Route::get('admin/services/all/', 'Admin\ServicesController@index');

    Route::post('admin/services/add', 'Admin\ServicesController@store')->name('add_services');
    Route::post('admin/services/update', 'Admin\ServicesController@update')->name('update_services');
    Route::post('admin/services/delete', 'Admin\ServicesController@delete')->name('delete_services');


    Route::get('admin/ourWorks/add', 'Admin\OurWorksController@create');
    Route::get('admin/ourWorks/edit/{id}', 'Admin\OurWorksController@edit')->name('edit_ourWorks');
    Route::get('admin/ourWorks/all/', 'Admin\OurWorksController@index');

    Route::post('admin/ourWorks/add', 'Admin\OurWorksController@store')->name('add_ourWorks');
    Route::post('admin/ourWorks/update', 'Admin\OurWorksController@update')->name('update_ourWorks');
    Route::post('admin/ourWorks/delete', 'Admin\OurWorksController@delete')->name('delete_ourWorks');




    Route::get('admin/article/add', 'Admin\ArticleController@create');
    Route::get('admin/article/edit/{id}', 'Admin\ArticleController@edit')->name('edit_article');
    Route::get('admin/article/all/', 'Admin\ArticleController@index');

    Route::post('admin/article/add', 'Admin\ArticleController@store')->name('add_article');
    Route::post('admin/article/update', 'Admin\ArticleController@update')->name('update_article');
    Route::post('admin/article/delete', 'Admin\ArticleController@delete')->name('delete_article');




    Route::get('admin/water/add', 'Admin\WaterController@create');
    Route::get('admin/water/edit/{id}', 'Admin\WaterController@edit')->name('edit_water');
    Route::get('admin/water/all/', 'Admin\WaterController@index');

    Route::post('admin/water/add', 'Admin\WaterController@store')->name('add_water');
    Route::post('admin/water/update', 'Admin\WaterController@update')->name('update_water');
    Route::post('admin/water/delete', 'Admin\WaterController@delete')->name('delete_water');





    Route::get('admin/reviews/all', function () {
        return view('admin.reviews.index');
    });
    Route::get('admin/reviews/{type}/add', 'Admin\ReviewsController@create');
    Route::get('admin/reviews/edit/{id}', 'Admin\ReviewsController@edit')->name('edit_reviews');
    Route::get('admin/reviews/all/{type}', 'Admin\ReviewsController@index')->name('all_reviews');

    Route::post('admin/reviews/add', 'Admin\ReviewsController@store')->name('add_reviews');
    Route::post('admin/reviews/update', 'Admin\ReviewsController@update')->name('update_reviews');
    Route::post('admin/reviews/delete', 'Admin\ReviewsController@delete')->name('delete_reviews');

    Route::get('admin/contacts', 'Admin\ContactsController@index')->name('all_contacts');
    Route::post('admin/contacts', 'Admin\ContactsController@update')->name('update_contacts');


    Route::get('admin/notifications', 'Admin\NotificationsController@index')->name('all_contacts');
    Route::post('admin/notifications/delete', 'Admin\NotificationsController@delete')->name('delete_notifications');


    Route::get('admin/checkout', 'Admin\CheckoutController@checkout')->name('all_checkout');
    Route::get('admin/checkout/edit/{id}', 'Admin\CheckoutController@edit')->name('edit_checkout');
    Route::post('admin/checkout/delete', 'Admin\CheckoutController@delete')->name('delete_checkout');


});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/uploadImage', ['uses' => 'StorageController@uploadImage']);


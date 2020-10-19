<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comparison;
use App\Models\Contacts;
use App\Models\Favorites;
use App\Models\Stocks;
use App\Models\StockToProducts;
use App\Models\Water;
use Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private function generateSalt()
    {
        $salt = '';
        $saltLength = 8;
        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126));
        }
        return $salt;
    }

    /**
     * Register any application services.
     *
     * @return void
     */


    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);


        $stocks = Stocks::all();

        foreach ($stocks as $stock) {
            if (strtotime($stock->finish) <= time()) {
                $stockToProducts = StockToProducts::where('id_stock', $stock->id)->get();

                foreach ($stockToProducts as $stockToProduct) {
                    $stockToProduct->delete($stockToProduct->id);
                }
            }
        }


        view()->composer('layouts.footer', function ($view) {
            $cookie_name = Cookie::get('name');

            if ($cookie_name == false) {
                $value = $this->generateSalt();

                $minutes = 525000;

                Cookie::queue('name', $value, $minutes);

                $user = $value;

            } else {
                $user = $cookie_name;
            }

            $contacts = Contacts
                ::where('id', 1)
                ->first();

            $categories = Category::all();

            $view->with(['cart_user_count' => Cart::user($user), 'categories' => $categories, 'favorites_user_count' => Favorites::user($user), 'comparison_user_count' => Comparison::user($user), 'contacts' => $contacts]);
        });

        view()->composer('layouts.header', function ($view) {
            $cookie_name = Cookie::get('name');

            if ($cookie_name == false) {
                $value = $this->generateSalt();

                $minutes = 525000;

                Cookie::queue('name', $value, $minutes);

                $user = $value;

            } else {
                $user = $cookie_name;
            }

            $contacts = Contacts
                ::where('id', 1)
                ->first();

            $categories = Category::all();

            $waters = Water::all();

            $view->with(['cart_user_count' => Cart::user($user), 'waters' => $waters, 'categories' => $categories, 'favorites_user_count' => Favorites::user($user), 'comparison_user_count' => Comparison::user($user), 'contacts' => $contacts]);
        });

        view()->composer('check_favorites', function ($view) {

            $cookie_name = Cookie::get('name');

            if ($cookie_name == false) {
                $value = $this->generateSalt();

                $minutes = 525000;

                Cookie::queue('name', $value, $minutes);

                $user = $value;

            } else {
                $user = $cookie_name;
            }

            $view->with(['cart_user_count' => Cart::user($user), 'favorites_user_count' => Favorites::user($user)]);
        });


        $contacts = Contacts
            ::where('id', 1)
            ->first();
        view()->share('contacts', $contacts);
    }
}

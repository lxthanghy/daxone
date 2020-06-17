<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
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
        view()->composer('*', function ($view) {
            //Load menu
            $categories = ProductCategory::all();

            $count = 0;
            $carts = session()->get('cart');
            if (isset($carts))
                $count = count($carts);
                
            $view->with([
                'categories' => $categories,
                'count' => $count,
                'carts' => $carts
            ]);
        });
    }
}

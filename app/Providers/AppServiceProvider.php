<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

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
        Paginator::useBootstrap();

        view()->composer('layouts.site', function($view){
            $categories = \App\Models\Category::all();
            $ad = \App\Models\Ad::first();

            $response2 = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
            $response2 = $response2 -> json();
            $money['usd'] =$response2[0]['Rate'];
            $money['rub'] =$response2[2]['Rate'];
            $money['euro'] =$response2[1]['Rate'];
            
            $view->with(compact('categories','money','ad'));
        });

        view()->composer('sections.popularPost', function($view){
            $popularPosts = \App\Models\Post::limit(6)->orderBY('view','DESC')->get();
            $ad = \App\Models\Ad::first();
            $view->with(compact('popularPosts','ad'));
        });
    }
}

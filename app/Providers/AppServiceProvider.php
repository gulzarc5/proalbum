<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;
use App\HomePage;

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
        View::composer('web.include.header', function ($view) {

            $categories = DB::table('category')
                ->where('status',1)
                ->orderBy('sort', 'ASC')
                ->get();
            $header_home = HomePage::where('id',1)->first();
            $data = [
                'categories' => $categories,
                'header_home' => $header_home,
            ];
           
            $view->with('header_data', $data);
        });

        View::composer('web.include.footer', function ($view) {


            $footer_home = HomePage::where('id',1)->first();
           
            $view->with('footer_home', $footer_home);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

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
                ->orderBy('sort', 'ASC')
                ->get();

            $data = [
                'categories' => $categories
            ];
           
            $view->with('header_data', $data);
        });
    }
}

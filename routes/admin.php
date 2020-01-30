<?php
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
    Route::get('login', 'LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@adminLogin');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('admin.deshboard');

        // Category Route
        Route::group(['prefix'=>'category'],function(){
            Route::get('/add/form','CategoryController@categoryAdd')->name('admin.categoryAdd');
            Route::post('/add','CategoryController@categoryInsert')->name('admin.categoryInsert');
        });

    });
});
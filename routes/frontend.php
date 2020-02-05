<?php
Route::group(['namespace'=>'Web'],function(){
	/** Index Router **/
	Route::get('/', 'IndexController@index')->name('web.index');

    /** User Registration Routes **/
    Route::get('registration-page', 'RegisterController@registrationPage')->name('web.registration_page');
    Route::get('registration', 'RegisterController@registration')->name('web.registration');

    /** User Login Routes */
	Route::get('login', 'LoginController@showLoginForm')->name('web.login');
	Route::post('login', 'LoginController@userLogin');

	/** User Logout **/
	Route::get('logout', 'LoginController@logout')->name('web.logout');
});

/** Frontend Route **/
Route::get('/Shop-list', function () {
    return view('web.shop-list');
})->name('web.shop-list');

/** Frontend Route **/
Route::get('/Shop-single', function () {
    return view('web.shop-single');
})->name('web.shop-single');

Route::get('/Cart', function () {
    return view('web.shop-cart');
})->name('web.shop-cart');

Route::get('/Account/Profile', function () {
    return view('web.account.profile');
})->name('web.account.profile'); 

Route::get('/Account/Profile/Edit', function () {
    return view('web.account.profile-edit');
})->name('web.account.profile-edit'); 

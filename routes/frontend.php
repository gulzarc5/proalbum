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

    Route::group(['middleware'=>'auth:users'],function(){

        /** My Profile **/
        Route::get('my-profile', 'UserController@myProfile')->name('web.my_profile'); 
        /** Edit My Profile **/
        Route::get('edit-my-profile', 'UserController@editMyProfile')->name('web.edit_my_profile');
        /** Update My Profile **/
        Route::post('update-my-profile', 'UserController@updateMyProfile')->name('web.update_my_profile');
    });
});

/** Frontend Route **/
Route::get('/Shop-list', function () {
    return view('web.shop-list');
})->name('web.shop-list');

/** Frontend Route **/
Route::get('/Shop-single', function () {
    return view('web.shop-single');
})->name('web.shop-single');


Route::get('/Forgot-password', function () {
    return view('web.forgot-password');
})->name('web.forgot-password');

Route::get('/New-password', function () {
    return view('web.new-password');
})->name('web.new-password');

Route::get('/Cart', function () {
    return view('web.shop-cart');
})->name('web.shop-cart');

//-----------------------------------------

// Route::get('/Account/Profile', function () {
//     return view('web.account.profile');
// })->name('web.account.profile'); 

// Route::get('/Account/Profile/Edit', function () {
//     return view('web.account.profile-edit');
// })->name('web.account.profile-edit'); 

Route::get('/Account/Shipping', function () {
    return view('web.account.shipping');
})->name('web.account.shipping'); 

Route::get('/Account/Shipping/Edit', function () {
    return view('web.account.shipping-edit');
})->name('web.account.shipping-edit');

Route::get('/Account/Change-password', function () {
    return view('web.account.change-password');
})->name('web.account.change-password'); 



<?php
Route::group(['namespace'=>'Web'],function(){
	/** Index Router **/
	Route::get('/', 'IndexController@index')->name('web.index');

    /** User Registration Routes **/
    Route::get('registration-page', 'RegisterController@showRegistrationForm')->name('web.registration_page');
    Route::get('registration', 'RegisterController@registration');

    /** User Login Routes */
	Route::get('login', 'LoginController@showLoginForm')->name('web.login');
	Route::post('login', 'LoginController@userLogin');

	/** User Logout **/
	Route::get('logout', 'LoginController@logout')->name('web.logout');

    /** Product List **/
    Route::get('product-list', 'ProductController@productList')->name('web.product_list');
    /** Product Details **/
    Route::get('product-detail/{slug}/{product_id}', 'ProductController@productDetail')->name('web.product_detail');

    Route::group(['middleware'=>'auth:users'],function(){

        /** My Profile **/
        Route::get('my-profile', 'UserController@myProfile')->name('web.my_profile'); 
        /** Edit My Profile **/
        Route::get('edit-my-profile', 'UserController@editMyProfile')->name('web.edit_my_profile');
        /** Update My Profile **/
        Route::post('update-my-profile', 'UserController@updateMyProfile')->name('web.update_my_profile');

        /** Shipping Address List **/
        Route::get('shipping-address-list', 'ShippingController@shippingAddressList')->name('web.shipping_address_list'); 
         /** Edit Shipping Address **/
        Route::get('edit-shipping-address', 'ShippingController@editShippingAddress')->name('web.edit_shipping_address');
         /** Update Shipping Address **/
        Route::post('update-shipping-address', 'ShippingController@updateShippingAddress')->name('web.update_shipping_address');

        /** Change Password **/
        Route::get('change-password-form', 'PasswordController@showChangePasswordForm')->name('web.change_password_form'); 
        /** Update Password **/
        Route::post('update-password', 'PasswordController@updatePassword'); 
    });
});

/** Frontend Route **/
Route::get('/Forgot-password', function () {
    return view('web.forgot-password');
})->name('web.forgot-password');

Route::get('/New-password', function () {
    return view('web.new-password');
})->name('web.new-password');

Route::get('/Cart', function () {
    return view('web.shop-cart');
})->name('web.shop-cart');

Route::get('/Checkout', function () {
    return view('web.shop-checkout');
})->name('web.shop-checkout');

Route::get('/Thank', function () {
    return view('web.shop-thank');
})->name('web.shop-thank');

//-----------------------------------------

// Route::get('/Account/Profile', function () {
//     return view('web.account.profile');
// })->name('web.account.profile'); 

// Route::get('/Account/Profile/Edit', function () {
//     return view('web.account.profile-edit');
// })->name('web.account.profile-edit'); 



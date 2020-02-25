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
    Route::get('product-list/{slug}/{id}', 'ProductController@productList')->name('web.product_list');
    /** Product Details **/
    Route::get('product-detail/{slug}/{product_id}', 'ProductController@productDetail')->name('web.product_detail');

    Route::post('product/detail/price/fetch', 'ProductController@productDetailPriceFetch')->name('web.product_detail_price_fetch');

    Route::post('product/add/cart', 'CartController@addToCart')->name('web.add_to_cart');
    Route::get('view/cart', 'CartController@viewCart')->name('web.view_cart');    
    Route::get('remove/cart/{cart_id}', 'CartController@removeCart')->name('web.remove_cart');

    Route::group(['middleware'=>'auth:users'],function(){

        /** My Profile **/
        Route::get('my-profile', 'UserController@myProfile')->name('web.my_profile'); 
        /** Edit My Profile **/
        Route::get('edit-my-profile', 'UserController@editMyProfile')->name('web.edit_my_profile');
        /** Update My Profile **/
        Route::post('update-my-profile', 'UserController@updateMyProfile')->name('web.update_my_profile');

        Route::get('/Add-shipping-address/form','ShippingController@addShippingAddressForm')->name('web.add_shipping_address_form');
        Route::post('add/shipping/address', 'ShippingController@addShippingAddress')->name('web.add_shipping_address');
        /** Shipping Address List **/
        Route::get('shipping-address-list', 'ShippingController@shippingAddressList')->name('web.shipping_address_list'); 
         /** Edit Shipping Address **/
        Route::get('edit/shipping/address/{address_id}', 'ShippingController@editShippingAddress')->name('web.edit_shipping_address');
         /** Update Shipping Address **/
        Route::post('update-shipping-address', 'ShippingController@updateShippingAddress')->name('web.update_shipping_address');

        /** Change Password **/
        Route::get('change-password-form', 'PasswordController@showChangePasswordForm')->name('web.change_password_form'); 
        /** Update Password **/
        Route::post('update-password', 'PasswordController@updatePassword'); 

        Route::get('checkout','CheckoutController@checkout')->name('web.checkout');
        Route::post('order/place','OrderController@orderPlace')->name('web.order_place');
        Route::get('order/success','OrderController@orderSuccess')->name('web.order_success');
        Route::get('order/history','OrderController@orderHistory')->name('web.order_history');
        Route::get('order/cancel/{id}','OrderController@orderCancel')->name('web.order_cancel');        
        Route::get('order/detail/cancel/{order_id}/{order_details_id}','OrderController@orderDetailsCancel')->name('web.order_details_cancel');

    });
});

/** Frontend Route **/
Route::get('/Forgot-password', function () {
    return view('web.forgot-password');
})->name('web.forgot-password');

Route::get('/New-password', function () {
    return view('web.new-password');
})->name('web.new-password');

// Route::get('/Cart', function () {
//     return view('web.shop-cart');
// })->name('web.shop-cart');

Route::get('/Checkout', function () {
    return view('web.shop-checkout');
})->name('web.shop-checkout');

Route::get('/Thank', function () {
    return view('web.shop-thank');
})->name('web.shop-thank');



Route::get('/Orders', function () {
    return view('web.shop-order');
})->name('web.shop-order');
//-----------------------------------------




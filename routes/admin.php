<?php
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
    Route::get('login', 'LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@adminLogin');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('admin.deshboard');

        // Category Route
        Route::group(['prefix'=>'category'],function(){
            /** Category Addition Section **/
            Route::get('/add/form','CategoryController@categoryAdd')->name('admin.categoryAdd');
            Route::put('/add','CategoryController@categoryInsert')->name('admin.categoryInsert');
            /** Category List **/
            Route::get('category-list','CategoryController@showCategoryList')->name('admin.category_list');
            /** Edit Category **/
            Route::get('edit-category/{category_id}','CategoryController@showCategoryEditForm')->name('admin.edit_category');
            /** Update Category **/
            Route::put('update-category','CategoryController@updateCategory')->name('admin.update_category');
            /** Changing Category Status **/
            Route::get('update-category-status/{category_id}/{status}','CategoryController@updateCategoryStatus')->name('admin.update_category_status');

             /** Changing Category Status **/
             Route::get('update-top-status/{category_id}/{status}','CategoryController@updateTopStatus')->name('admin.update_top_status');


            /** Category CK Editor Image Upload **/
            Route::post('ck-editor-image-upload','CategoryController@ckEditorImageUpload')->name('admin.ck_editor_image_upload');
        });

        Route::group(['prefix'=>'product'],function(){
            Route::get('list','ProductController@productList')->name('admin.product_list');
            Route::get('list/ajax','ProductController@productListAjax')->name('admin.product_list_ajax');
            Route::get('add/form','ProductController@productAddForm')->name('admin.product_add_form');
            Route::post('add','ProductController@productAdd')->name('admin.product_add');
            Route::get('single/view/{p_id}','ProductController@singleView')->name('admin.product_single_view');

            Route::get('option/form/{p_id}/{tab?}','ProductController@productOptionForm')->name('admin.product_option_form');
            Route::post('new/option/detail','ProductController@productOptionDetailAdd')->name('admin.new_option_add');
            Route::post('option/edit','ProductController@productOptionEdit')->name('admin.new_option_Edit');

            Route::get('option/edit/form/{p_id}/{tab?}','ProductController@productOptionEditForm')->name('admin.product_option_edit_form');
            Route::post('new/option/Add','ProductController@productOptionAdd')->name('admin.new_option_edit_add');

            Route::get('size/edit/{p_id}','ProductController@productSizeEditForm')->name('admin.product_size_edit_form');
            Route::post('new/size/Add','ProductController@productNewSize')->name('admin.new_product_size_add');
            Route::post('size/update','ProductController@productSizeUpdate')->name('admin.new_product_size_update');


            Route::get('edit/ifo/{id}','ProductController@productEdit')->name('admin.product_edit_form');
            Route::post('update','ProductController@productUpdate')->name('admin.new_product_update');

            Route::get('edit/image/{id}','ProductController@productImageEdit')->name('admin.product_image_edit');
            Route::get('image/set/cover/{p_id}/{image_id}','ProductController@productImageCoverSet')->name('admin.product_image_set_cover');

            Route::post('add/more/image','ProductController@productMoreImageAdd')->name('admin.product_more_image_add');
            Route::get('delete/image/{id}','ProductController@productImageDelete')->name('admin.product_image_delete');

            Route::get('update/homepage/cat/{id}/{status}/{type}','ProductController@updateHomePageCat')->name('admin.product_home_page_cat_update');

        });

        // Units Route
        Route::group(['prefix'=>'units'],function(){

            /** Units Addition Section **/
            Route::get('units-add-form','UnitsController@showUnitsAddForm')->name('admin.units_add_form');
            Route::post('add-units','UnitsController@addUnits')->name('admin.add_units');
            /** Units List **/
            Route::get('units-list','UnitsController@showUnitsList')->name('admin.units_list');
            /** Edit Units **/
            Route::get('edit-units/{units_id}','UnitsController@showUnitsEditForm')->name('admin.edit_units');
            /** Update Units **/
            Route::post('update-units','UnitsController@updateUnits')->name('admin.update_units');
            /** Delete Units **/
            Route::get('delete-units/{units_id}','UnitsController@deleteUnits')->name('admin.delete_units');
        });

        // Banner Route
        Route::group(['prefix'=>'banner'],function(){

            /** Banner Addition Section **/
            Route::get('banner-add-form','BannerController@showBannerAddForm')->name('admin.banner_add_form');
            Route::post('add-banner','BannerController@addBanner')->name('admin.add_banner');
            Route::get('edit/{banner_id}','BannerController@editBanner')->name('admin.edit_banner');
            Route::put('update/{banner_id}','BannerController@updateBanner')->name('admin.update_banner');
            Route::get('status/{banner_id}/{status}','BannerController@updateStatus')->name('admin.update_banner_status');
            Route::get('delete/{banner_id}','BannerController@deleteBanner')->name('admin.delete_banner');
        });

        Route::group(['prefix'=>'user'],function(){
            Route::get('list','CustomerController@customerList')->name('admin.customer_list');
            Route::get('list/ajax','CustomerController@customerListAjax')->name('admin.customer_list_ajax');
            Route::get('details/{id}','CustomerController@customerDetails')->name('admin.customer_details');
            Route::get('change/password/form','LoginController@changePasswordForm')->name('admin.change_password_form');
            Route::post('change/password','LoginController@changePassword')->name('admin.change_password');

        });

        Route::group(['prefix'=>'order'],function(){
            Route::get('list','OrderController@orderList')->name('admin.order_list');
            Route::get('list/ajax','OrderController@orderListAjax')->name('admin.order_list_ajax');
            Route::get('details/{order_id}','OrderController@orderDetails')->name('admin.order_details');
            Route::get('status/update/{order_details_id}/{status}','OrderController@orderStatusUpdate');
            Route::get('invoice/{order_id}','OrderController@orderInvoice')->name('admin.order_invoice');
        });

        // Category Route
        Route::group(['prefix'=>'home'],function(){
            /** Category Addition Section **/
            Route::get('/edit','HomePageController@homeEdit')->name('admin.home_edit');
            Route::put('/update','HomePageController@homeUpdate')->name('admin.home_update');

            
            Route::get('/firstcat','HomePageController@firstCategory')->name('admin.home_first_cat');
            Route::get('/secondcat','HomePageController@secondCategory')->name('admin.home_second_cat');
            Route::get('/thirdcat','HomePageController@thirdCategory')->name('admin.home_third_cat');
            Route::get('/fourthcat','HomePageController@fourthCategory')->name('admin.home_fourth_cat');
        });
    });
});

Route::get('admin/add/option/details', function () {
    return view('admin.products.add_product_option');
})->name('admin.products.add_product_option');

Route::get('admin/product/details', function () {
    return view('admin.products.product_detail');
})->name('admin.products.product_detail');

Route::get('admin/product/Images', function () {
    return view('admin.products.product_image');
})->name('admin.products.product_image');
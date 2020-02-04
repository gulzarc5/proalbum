<?php

/** Frontend Route **/
Route::get('/', function () {
    return view('web.index');
})->name('web.index');

/** Frontend Route **/
Route::get('/Shop-list', function () {
    return view('web.shop-list');
})->name('web.shop-list');

/** Frontend Route **/
Route::get('/Shop-single', function () {
    return view('web.shop-single');
})->name('web.shop-single');

Route::get('/Login', function () {
    return view('web.login');
})->name('web.login');

Route::get('/Register', function () {
    return view('web.register');
})->name('web.register');
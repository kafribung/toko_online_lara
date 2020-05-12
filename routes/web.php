<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/dashboard', 'DashboardController@dashboard');

    Route::get('/product/{id}/image', 'ProductController@image');
    Route::get('/product/restore', 'ProductController@restore')->middleware('password.confirm');
    Route::resource('product', 'ProductController');

    Route::get('/gallery/restore', 'GalleryController@restore')->middleware('password.confirm');
    Route::resource('/gallery', 'GalleryController');



    Route::get('/transaction/{id}/status', 'TransactionController@status')->name('transaction.status');
    Route::resource('/transaction', 'TransactionController');
});

Auth::routes(['register' => true]);


Route::get('/home', 'HomeController@index')->name('home');

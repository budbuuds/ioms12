<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    // news
    Route::get('news', 'Backend\NewsController@index')->name('news');
    Route::post('news', 'Backend\NewsController@store')->name('news.store');
    Route::post('cari_data_news', 'Backend\NewsController@cari_data_news')->name('cari_data_news');
    Route::delete('news/{news}', 'Backend\NewsController@destroy')->name('news.delete');
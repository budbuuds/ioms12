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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home1', 'HomeController@index1')->name('home1');
// Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);
    // news
    Route::get('news', 'Backend\NewsController@index')->name('news');
    Route::post('news', 'Backend\NewsController@store')->name('news.store');
    Route::post('cari_data_news', 'Backend\NewsController@cari_data_news')->name('cari_data_news');
    Route::delete('news/{news}', 'Backend\NewsController@destroy')->name('news.delete');
    Route::post('news/active', 'Backend\NewsController@active')->name('news.active');
    Route::post('news/non_active', 'Backend\NewsController@non_active')->name('news.non_active');


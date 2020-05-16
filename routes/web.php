<?php

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
    return view('home');
});
Route::resource('home','home');
Route::resource('governorate', 'GovernorateController');
Route::resource('city', 'CityController');
Route::resource('contant','ContantController');
Route::resource('category', 'CategoryController');
Route::resource('donationrequest','DonationrequiestController');
Route::resource('post','PostController');
Route::resource('client','ClientController');
Route::put('is_active/{id}', 'ClientController@is_active')->name('client.is_active');
Route::delete('client/{id}', 'ClientController@destroy')->name('client.destroy');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();




//Route::resource('home','home');
Route::group(['middleware' => ['auth','auto-check-permission'] , 'prefix' => 'admin'], function () {
Route::get('/', 'HomeController@index')->name('home');
Route::resource('governorate', 'GovernorateController');
Route::resource('city', 'CityController');
Route::resource('contant','ContantController');
Route::resource('category', 'CategoryController');
Route::resource('donationrequest','DonationrequiestController');
Route::resource('post','PostController');
Route::resource('client','ClientController');
Route::resource('role', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('settings','SettingsController');

Route::post('changePassword', 'UserController@changePassword')->name('changePassword');
Route::get('getChangePassword', 'UserController@getChangePassword')->name('getChangePassword');

Route::put('is_active/{id}', 'ClientController@is_active')->name('client.is_active');
Route::delete('client/{id}', 'ClientController@destroy')->name('client.destroy');



});








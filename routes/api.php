<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::group(['prefix' => 'v1' , 'namespace' => 'Api'], function () {

        //Main Controller 
        Route::get('governorates', 'MainController@governorates');
        Route::get('cities', 'MainController@cities');
        Route::get('setting', 'MainController@setting');

        //Auth Controller 
        Route::post('register','AuthController@register');
        Route::post('login','AuthController@login');
        Route::post('resetpassword','AuthController@resetpassword');
        Route::post('newpassword','AuthController@newpassword');
       
        Route::group(['middleware' => 'auth:api'],function(){
            Route::get('categories','MainController@categories');
            Route::get('notifications','MainController@notifications');
            Route::get('donationRequest','MainController@donationRequests');
            Route::post('createDonationRequests','MainController@createDonationRequests');
            Route::post('contact','MainController@contact');
            Route::post('register_token','AuthController@registerToken');
            Route::post('remove_token','AuthController@removeToken');
            Route::post('profiledit','MainController@profiledit');
            Route::post('searchCategory','MainController@searchCategory');
            Route::get('Favourites','MainController@Favourites');
            Route::post('toggleFavourites','MainController@toggleFavourites');
            Route::get('getNotificationSettings','MainController@getNotificationSettings');
            Route::post('updateNotificationSettings','MainController@updateNotificationSettings');

        });
        
    });

   



//url : api /V1/ name of servces
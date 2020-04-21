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
        
    });

   



//url : api /V1/ name of servces
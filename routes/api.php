<?php

use Illuminate\Http\Request;
use App\User;
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

Route::group(['prefix' => 'v1/'], function() {

    Route::middleware('jwt.verify')->group(function() {
        // Route::get('user/{id}','API\UserController@getUser');

        // Customers API
        Route::prefix('customer')->group(function() {
            // Get Customer Profile
            Route::get('/{id}','API\CustomerController@getCustomer');
            // Get Customer Transactions
            Route::get('/{id}/payments','API\CustomerController@getCustomerTransactions');
        });
    });
    
    Route::get('test',function() {
        return response()->json('Hurray API Works', 200);
    });
    
    Route::post('login','API\UserController@login');
    Route::post('register','API\UserController@register');

});

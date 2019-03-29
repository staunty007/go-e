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

// Route::middleware('jwt.auth')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test',function() {
    return response()->json('Hurray API Works', 200);
});

Route::post('login','API\UserController@login');
Route::post('register','API\UserController@register');
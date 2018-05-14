<?php


Route::get('/', function () {
    return view('index');
});
Route::get('faq', function () {
	return view('faq');
});
Route::post('account/login','AccountController@loginUser');
Route::post('account/register','AccountController@registerUser')->name('signup');
Route::get('registration/verify','AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}','AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success','AccountController@paymentSuccess');
Route::post('payment/hold','AccountController@paymentHolder');
// User Dashboard

Route::middleware('auth')->group(function(){
    Route::get('home','AccountController@home')->name('home')->middleware('auth');
    Route::get('customer-profile','AccountController@customerProfile')->name('customer-profile');
    Route::get('make-payment','AccountController@makePayment')->name('make-payment');
    Route::post('make-payment','AccountController@postPayment');
    Route::get('meter-request','AccountController@meterRequest')->name('meter.request');
    Route::post('meter-request','AccountController@postMeterRequest')->name('meter.request');
    Route::get('payment-history','AccountController@paymentHistory')->name('payment-history');
});
Route::post('logout','AccountController@logout')->middleware('auth')->name('logout');
<?php


Route::get('/', function () {
    return view('index');
});
Route::get('finalize/{number}/{ref}', function () {
    return view('finalize');
})->name('finalize');
Route::get('faq', function () {
    return view('faq');
});
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');
Route::get('registration/verify', 'AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success', 'AccountController@paymentSuccess');

Route::get('payment/postpaid',function() {
    return view('make_payments');
})->name('postpaid');
Route::get('postpaidpayment', function () {
    return view('postpaidpayment');
})->name('postpaid');

Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');
Route::get('registration/verify', 'AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success', 'AccountController@paymentSuccess');
Route::get('postpaidpayment/{ref}/success', 'AccountController@postpaidpaymentSuccess');


Route::post('payment/hold', 'AccountController@paymentHolder');
// User Dashboard

Route::middleware('auth')->group(function () {
    Route::get('home', 'AccountController@home')->name('home')->middleware('auth');
    Route::get('customer-profile', 'AccountController@customerProfile')->name('customer-profile');
    Route::get('make-payment', 'AccountController@makePayment')->name('make-payment');
    Route::post('make-payment', 'AccountController@postPayment');
    Route::get('meter-request', 'AccountController@meterRequest')->name('meter.request');
    Route::post('meter-request', 'AccountController@postMeterRequest')->name('meter.request');
    Route::get('payment-history', 'AccountController@paymentHistory')->name('payment-history');
});

// Admin
Route::prefix('backend')->group(function () {
    Route::get('/', function () {
        return redirect()->route('backend-login');
    });
    Route::get('login', 'BackendController@getUserLogin')->name('backend-login');
    Route::post('login', 'BackendController@userLogin')->name('backend-login');

    // Administrator
    Route::get('administrator', 'AdminController@home')->name('admin.home');
    Route::get('finance', 'AdminController@finance')->name('admin.finance');
    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::get('customer_report', 'AdminController@customer_report')->name('admin.customer_report');
    Route::get('payment_history', 'AdminController@payment_history')->name('admin.payment_history');
    Route::get('demographics', 'AdminController@demographics')->name('admin.demographics');
    Route::get('meter_admin', 'AdminController@meter_admin')->name('admin.meter_admin');
    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    Route::get('sms', 'AdminController@sms')->name('admin.sms');

    // Agents
    Route::get('agent', 'AgentController@home')->name('agent.home');
});

Route::post('logout', 'AccountController@logout')->middleware('auth')->name('logout');

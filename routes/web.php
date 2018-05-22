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

Route::get('payment/postpaid', function () {
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
    Route::get('payment-frame','AccountController@paymentFrame');
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

    Route::post('updateprofile', 'AdminController@updateprofile')->name('admin.updateprofile');

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
    Route::get('topup-admin/success/{amount}','AdminController@completeTopup');


});

Route::prefix('agent')->group(function() {
    Route::get('profile','AgentController@profile')->name('agent.profile');
    Route::get('payment-history','AgentController@paymentHistory')->name('agent.payHistory');
    Route::get('meter-management','AgentController@meterManagement')->name('agent.meter');
    Route::post('meter-management','AccountController@postMeterRequest')->name('meter.post-request');
    Route::get('buy-token','AgentController@buyToken')->name('agent.buy-token');
    Route::get('dashboard','AgentController@dashboard')->name('agent.dashboard');
    Route::get('check-admin-balance','AgentController@checkAdminBalance');
    Route::get('topup-agent/success/{amount}','AgentController@completeTopup');
    Route::get('payment-agent/{ref}/success','AgentController@agentTokenSuccess');
    Route::get('payment-agent-customer/{ref}/success','AgentController@agentCustomerTokenSuccess');
});


Route::prefix('distributor')->group(function () {
    Route::get('/', function () {
        return redirect()->route('backend-login');
    });
    Route::get('login', 'BackendController@getUserLogin')->name('backend-login');
    Route::post('login', 'BackendController@userLogin')->name('backend-login');
    // Administrator
    Route::get('distributor', 'DistributorController@home')->name('distributor.home');
    Route::get('finance', 'DistributorController@finance')->name('distributor.finance');
    Route::get('profile', 'DistributorController@profile')->name('distributor.profile');
    Route::get('customer_payment', 'DistributorController@customer_payment')->name('distributor.customer_payment');
    Route::get('demographics', 'DistributorController@demographics')->name('distributor.demographics');
    Route::get('meter_admin', 'DistributorController@meter_admin')->name('distributor.meter_admin');
    Route::get('settings', 'DistributorController@settings')->name('admin.settings');
    
});




Route::post('logout', 'AccountController@logout')->middleware('auth')->name('logout');

<?php


use Illuminate\Support\Facades\Auth;
use App\CustomerBiodata;
use App\AgentBiodata;

Route::get('/', function () { return view('index'); });

Route::post('/meter/api','MeterApiController@validateMeterUser');
Route::get('/meter/api/','MeterApiController@validateMeterReturn');

Route::get('finalize/{number}/{ref}', function () { return view('finalize'); })->name('finalize');
Route::get('faq', function () { return view('faq'); });
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');
Route::get('registration/verify', 'AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success', 'AccountController@paymentSuccess');


Route::middleware('auth')->group(function() {
    Route::get('home','AccountController@home')->name('home');
});


Route::get('postpaidpayment', function () {
    if(Auth::check()) {
        // check if visiting user is not an agent
        if(Auth::user()->id !== 2) {
            $loggedDetails = CustomerBiodata::where('user_id',Auth::user()->id)->first();
        }else {
            // The User is an agent
            $loggedDetails = AgentBiodata::where('user_id',Auth::user()->id)->first();
        }
        return view('postpaidpayment-logged')->withUser($loggedDetails);
    }

    $loggedDetails['meter_no'] = "";

    return view('postpaidpayment')->withUser($loggedDetails);
})->name('postpaid');

Route::get('postpaid-payment', function() {

})->name('postpaid-logged');

Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');
Route::get('registration/verify', 'AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success', 'AccountController@paymentSuccess');


Route::get('postpaidpayment/{ref}/success', 'AccountController@postpaidpaymentSuccess');
Route::get('postpaidpayment/logged/{ref}/success','AccountController@loggedPostpaidPaymentSuccess');

// Prepaid Payment Holder
Route::post('payment/hold', 'AccountController@paymentHolder');
// Prepaid Agent Holder
Route::post('payment/hold/agent', 'AccountController@paymentAgentPrepaidHolder');

// Postpaid Payment Holder
Route::post('payment/hold/postpaid','AccountController@paymentPostpaidHolder');
Route::post('payment/hold/agent/postpaid','AccountController@paymentAgentPostpaidHolder');

// User Dashboard

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('home', 'AccountController@home')->name('customer.home');
    Route::get('profile', 'AccountController@customerProfile')->name('customer.profile');
    Route::post('profile/update','AccountController@updateProfile')->name('customer.update-profile');
    Route::get('prepaid-payment', 'AccountController@prepaidPayment')->name('customer.prepaid-payment');
    Route::get('postpaid-payment', 'AccountController@postpaidPayment')->name('customer.postpaid-payment');
    Route::get('payment-frame','AccountController@paymentFrame');
    Route::post('prepaid-payment', 'AccountController@postPrepaidPayment');
    Route::post('postpaid-payment', 'AccountController@postPostpaidPayment');
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
    Route::get('administrator', 'AdminController@home')->name('admin.home');
    Route::get('finance', 'AdminController@finance')->name('admin.finance');
    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::get('direct-transactions', 'AdminController@directTransactions')->name('admin.direct-transactions');
    Route::get('agent-transactions', 'AdminController@agentTransactions')->name('admin.agent-transactions');
    Route::get('payment_history', 'AdminController@payment_history')->name('admin.payment_history');
    Route::get('demographics', 'AdminController@demographics')->name('admin.demographics');
    Route::get('meter_admin', 'AdminController@meter_admin')->name('admin.meter_admin');
    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    Route::get('sms', 'AdminController@sms')->name('admin.sms');
    Route::get('topup-admin/success/{amount}','AdminController@completeTopup');
    Route::resource('manage/users','UserManagerController');
    Route::resource('manage/agents','AgentManagerController');

    Route::get('finance/admin-income-report',['uses' => 'AdminController@adminIncomeReport']);

});

Route::prefix('agent')->group(function() {
    Route::get('profile','AgentController@profile')->name('agent.profile');
    Route::get('payment-history','AgentController@paymentHistory')->name('agent.payHistory');
    Route::get('meter-management','AgentController@meterManagement')->name('agent.meter');
    Route::post('meter-management','AccountController@postMeterRequest')->name('meter.post-request');
    Route::get('prepaid-token','AgentController@prepaidToken')->name('agent.prepaid-token');
    Route::get('postpaid-token','AgentController@postpaidToken')->name('agent.postpaid-token');
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

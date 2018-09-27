<?php


use Illuminate\Support\Facades\Auth;
use App\CustomerBiodata;
use App\AgentBiodata;
use App\AdminBiodata;
use App\User;
use Illuminate\Support\Facades\Input;

// Route::get('/', function () { return view('index'); });
Route::get('/', 'PagesController@index');


Route::prefix('guest')->group(function () {
    Route::get('home','GuestController@guestServices')->name('guest.services');
    Route::get('login', 'GuestController@guestLogIn')->name('guest.login');
    Route::get('signup', 'GuestController@guestSignUp')->name('guest.signup');
    Route::get('service-type', 'GuestController@serviceType')->name('guest.service_type');
    Route::get('each-service-type/{name}', 'GuestController@eachServicesType')->name('guest.each_type');
    Route::get('support', 'GuestController@support')->name('guest.support');
    Route::get('agent_reg', 'GuestController@agent_reg')->name('guest.agent_reg');
  


});



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
        $violated = "";
        // check if visiting user is not an agent
        if(Auth::user()->id !== 2) {
            $loggedDetails = CustomerBiodata::where('user_id',Auth::user()->id)->first();
        }else {
            // The User is an agent
            $loggedDetails = AgentBiodata::where('user_id',Auth::user()->id)->first();
            $adminDetails = AdminBiodata::where('user_id',1)->first();
            $agentBalance = $loggedDetails->wallet_balance;
            $adminBalance = $adminDetails->wallet_balance;
            // if($adminBalance < $agentBalance) {
            //     $violated = "Yes";
            // }
        }
        return view('postpaidpayment-logged')->withUser($loggedDetails)->withViolated($violated);
    }

    $loggedDetails['meter_no'] = "";

    return view('postpaidpayment')->withUser($loggedDetails);
})->name('postpaid');

Route::get('postpaid-payment', function() {

})->name('postpaid-logged');

Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');

// Referral Registration
Route::get('signup/r/{ref}','AccountController@refReg'); //http://localhost:8000/r/pQhkLwErUi

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
    Route::get('crm', 'AdminController@crm')->name('admin.crm');
    Route::get('topup-admin/success/{amount}','AdminController@completeTopup');
    Route::resource('manage/users','UserManagerController');
    Route::resource('manage/agents','AgentManagerController');
    Route::get('finance/admin-income-report','AdminController@adminIncomeReport');
    Route::get('admin-topup-trackers','AdminController@topupTracker')->name('admin.admin-topup-track');
    Route::get('agent-topup-trackers','AdminController@agentTopupTracker')->name('admin.agent-topup-track');
    Route::get('agentsales','AdminController@agentSales')->name('admin.agentsales');
    Route::get('income','AdminController@income')->name('admin.income');
    Route::get('customerlist','AdminController@customerlist')->name('admin.customerlist');
    Route::get('managecustomers','AdminController@managecustomers')->name('admin.managecustomers');
});

Route::prefix('agent')->group(function() {
    Route::get('profile','AgentController@profile')->name('agent.profile');
    Route::post('profile','AgentController@updateProfile')->name('agent.update');
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
// Agent APIs
Route::get('complete/agent-topup/{amount}','AgentController@completeTopup');

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
    //Route::get('settings', 'DistributorController@settings')->name('admin.settings');
    Route::get('meter/change-status/{id}','DistributorController@getChangeStatus')->name('meter.change');
    Route::post('meter/change-status/{id}','DistributorController@postChangeStatus')->name('meter.update');
    
});

// Diamond APIS
// Initialize Access Token
Route::get('diamond/access-token','DiamondApiController@generateAccessToken');
// Credit aPI
Route::get('diamond/credit/{amount}','DiamondApiController@credit');
// Debit API
Route::get('diamond/debit/agent/{accountnumber}/{amount}','DiamondApiController@agentDebit');
Route::get('diamond/debit/admin/{accountnumber}/{amount}','DiamondApiController@adminDebit');

// End to End API
Route::get('e2e/api/customers', function() {
    $token = Input::get('token_access');
    if(empty($token)) return response()->json(['error' => 'Token not Provided'], 400);
    return User::where('role_id', 0)->get(['id','first_name']);
});

Route::get('/lists/services/{keyword}', function($keyword){;
    // return $keyword;
    return DB::table('services_list')->where('title','LIKE',"%$keyword%")->get();
});

// Services 
Route::prefix('services')->group(function() {
    Route::get('ekedc','ServicesController@ekedc');
});
Route::post('logout', 'AccountController@logout')->middleware('auth')->name('logout');
Route::post('password/email','\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware(['guest','web']);
Route::get('password/reset','\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware(['guest','web']);
Route::get('password/reset/{token}','\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset')->middleware(['guest','web']);
Route::post('password/reset','\App\Http\Controllers\Auth\ResetPasswordController@reset')->middleware(['guest','web']);
// Auth::routes(['except' => ['register']]);

Route::get('login', function() {
    return redirect('/');
})->name('login');
Route::get('register', function() {
    return redirect('/');
})->name('register');


// SOAP API TEST ROUTES / REST APIs ROUTES
Route::prefix('in-app/api')->group(function() {
    Route::get('soap/validate-customer/{number}','TestSoapController@validateCustomer');
    Route::get('soap/charge/{amount}','TestSoapController@chargeWallet');
});
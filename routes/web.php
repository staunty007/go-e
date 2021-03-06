<?php


use Illuminate\Support\Facades\Auth;
use App\CustomerBiodata;
use App\AgentBiodata;
use App\AdminBiodata;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\TestSoapController;
use Illuminate\Http\Request;

Route::get('banks-to-banks', function () {
    return view('nibbs-interface');
});

Route::post('nibbs/requery-transaction', 'API\NibbsController@requeryTransaction');

Route::get('ikeja/fetch-customer','IkejaController@index');
Route::get('gt/pay','GTPayController@sendTransaction');
Route::get('gt/notify','GTPayController@getNotification');

Route::get('/', function () {
    // if (url()->previous() == url('ekedc') || url()->previous() == url('distributor/*')) {
    //     return back();
    // }
    // return redirect('ekedc');
    return view('guest.home');
});

// Route::get("download-reciept/{payment_ref}", "PagesController@downloadReciept")->name('download-reciept');
Route::get("payment-reciept/{payment_ref}", "PagesController@viewReciept")->name('view-reciept');

Route::prefix('guest')->group(function () {
    Route::get('home', 'GuestController@guestServices')->name('guest.services');
    Route::get('login', 'GuestController@guestLogIn')->middleware('guest')->name('guest.login');
    Route::get('signup', 'GuestController@guestSignUp')->middleware('guest')->name('guest.signup');
    Route::get('each-service-type', 'GuestController@serviceType')->name('guest.service_type');
    Route::get('each-service-type/{name}', 'GuestController@eachServicesType')->name('guest.each_type');
    Route::get('postpaid-service-type/{service}', 'GuestController@eachTypeServicesSingle')->name('guest.each_type_service');
    Route::get('support', 'GuestController@support')->name('guest.support');
    Route::get('agent_reg', 'GuestController@agent_reg')->name('guest.agent_reg');
    Route::get('become_agent', 'GuestController@become_agent')->name('guest.become_agent');
    Route::get('agent_solution', 'GuestController@agent_solution')->name('guest.agent_solution');
    Route::get('agent_signup', 'GuestController@agent_signup')->name('guest.agent_signup');
    Route::post('agent_signup', 'GuestController@postAgentSignup')->name('guest.agent_signup-store');
    Route::get('agent_benefit', 'GuestController@agent_benefit')->name('guest.agent_benefit');
    Route::get('faq', 'GuestController@faq')->name('guest.faq');
});

/**
 * Social Logins
 */
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
// 
Route::post('account/login', 'AccountController@loginUser');
Route::post('account/register', 'AccountController@registerUser')->name('signup');
Route::post('account/email/resend', 'AccountController@resendEmail');
// Referral Registration
Route::get('signup/r/{ref}', 'AccountController@referredSignup'); //http://localhost:8000/signup/r/pQhkLwErUi
Route::get('registration/verify', 'AccountController@sendAccountMail')->name('semd.mail');
Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');
Route::get('payment/{ref}/success', 'AccountController@paymentSuccess');
// Route::get('password/reset/{token}','AccountController@resetPassword');
// Route::post('password/reset/{token}','AccountController@resetPassword')->name('password.request');
// Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('home', 'AccountController@home')->name('home');
});


Route::get('postpaidpayment', function () {
    if (Auth::check()) {
        $violated = "";
        // check if visiting user is not an agent
        if (Auth::user()->id !== 2) {
            $loggedDetails = CustomerBiodata::where('user_id', Auth::user()->id)->first();
        } else {
            // The User is an agent
            $loggedDetails = AgentBiodata::where('user_id', Auth::user()->id)->first();
            $adminDetails = AdminBiodata::where('user_id', 1)->first();
            $agentBalance = $loggedDetails->wallet_balance;
            $adminBalance = $adminDetails->wallet_balance;
        }
        return view('postpaidpayment-logged')->withUser($loggedDetails)->withViolated($violated);
    }

    $loggedDetails['meter_no'] = "";

    return view('postpaidpayment')->withUser($loggedDetails);
})->name('postpaid');

Route::get('postpaid-payment', function () { })->name('postpaid-logged');

// Prepaid Payment Holder
Route::post('payment/hold', 'AccountController@paymentHolder');
// Prepaid Agent Holder
Route::post('payment/hold/agent', 'AccountController@paymentAgentPrepaidHolder');

// Postpaid Payment Holder
Route::post('payment/hold/postpaid', 'AccountController@paymentPostpaidHolder');
Route::post('payment/hold/agent/postpaid', 'AccountController@paymentAgentPostpaidHolder');

// User Dashboard
Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('home', 'AccountController@home')->name('customer.home');
    Route::get('profile', 'AccountController@customerProfile')->name('customer.profile');
    Route::post('profile/update', 'AccountController@updateProfile')->name('customer.update-profile');
    Route::get('prepaid-payment', 'AccountController@prepaidPayment')->name('customer.prepaid-payment');
    Route::get('postpaid-payment', 'AccountController@postpaidPayment')->name('customer.postpaid-payment');
    Route::get('payment-frame', 'AccountController@paymentFrame');
    Route::post('prepaid-payment', 'AccountController@postPrepaidPayment');
    Route::post('postpaid-payment', 'AccountController@postPostpaidPayment');
    Route::get('meter-request', 'AccountController@meterRequest')->name('meter.request');
    Route::post('meter-request', 'AccountController@postMeterRequest')->name('meter.request');
    Route::get('payment-history', 'AccountController@paymentHistory')->name('payment-history');
    Route::get('payment-history/{reciept_id}', 'AccountController@ViewPaymentReciept')->name('view-pay-history');
    Route::get('reciept/pdf/{reciept_id}', 'AccountController@pdfDownload');
    //postpaid-new
    Route::get('postpaid_new', 'AccountController@postpaid_new')->name('postpaid_new-history');
    //end post paid new
    Route::prefix('tickets')->group(function () {
        Route::get('/all', 'TicketsController@customerTickets')->name('customer.tickets');
        Route::get('/view/{ticket}', 'TicketsController@showTicket')->name('show-ticket');
        Route::get('new-ticket', 'TicketsController@openTicket')->name('customer.open-ticket');
        Route::post('new-ticket', 'TicketsController@storeTicket');
    });

    // API Calls only
    Route::get('update-wallet/{amount}', 'AccountController@updateFunds');
});
Route::get('validate-customer-meter/{meterNo}', 'AccountController@validateMeter');
Route::post('/comment', 'TicketsController@commentTicket')->name('ticket.comment');

// Admin
Route::prefix('backend')->group(function () {
    Route::get('/', function () {
        return redirect()->route('backend-login');
    });
    Route::get('login', 'BackendController@getUserLogin')->name('backend-login');
    Route::post('login', 'BackendController@userLogin')->name('backend-login');
    Route::middleware(['auth', 'administrator'])->group(function () {
        Route::post('updateprofile', 'AdminController@updateprofile')->name('admin.updateprofile');
        Route::get('administrator', 'AdminController@home')->name('admin.home');
        Route::get('finance', 'AdminController@finance')->name('admin.finance');
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('dashboard1', 'AdminController@dashboard1')->name('admin.dashboard1');
        Route::get('finance/filter-by-date', 'AdminController@financeFilterDate');
        Route::get('profile', 'AdminController@profile')->name('admin.profile');
        Route::get('direct-transactions', 'AdminController@directTransactions')->name('admin.direct-transactions');
        Route::get('agent-transactions', 'AdminController@agentTransactions')->name('admin.agent-transactions');
        Route::get('income_channel', 'AdminController@income_channel')->name('admin.income_channel');
        Route::view('requery-transactions', 'users.admin.requery-transactions')->name('admin.requery-transactions');
        Route::get('payment_history', 'AdminController@payment_history')->name('admin.payment_history');
        Route::get('demographics', 'AdminController@demographics')->name('admin.demographics');
        Route::get('district-energy', 'AdminController@district_energy')->name('admin.district-energy');
        Route::get('customer-energy', 'AdminController@customer_energy')->name('admin.customer-energy');
        Route::get('meter_admin', 'AdminController@meter_admin')->name('admin.meter_admin');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::get('crm', 'AdminController@crm')->name('admin.crm');
        Route::get('topup-admin/success/{amount}', 'AdminController@completeTopup');
        Route::resource('manage/users', 'UserManagerController');
        Route::resource('manage/agents', 'AgentManagerController');
        Route::resource('manage/discos', 'DiscoManagerController');
        Route::get('finance/admin-income-report', 'AdminController@adminIncomeReport');
        Route::get('admin-topup-trackers', 'AdminController@topupTracker')->name('admin.admin-topup-track');
        Route::get('agent-topup-trackers', 'AdminController@agentTopupTracker')->name('admin.agent-topup-track');
        Route::get('agentsales', 'AdminController@agentSales')->name('admin.agentsales');
        Route::get('income', 'AdminController@income')->name('admin.income');
        Route::get('customerlist', 'AdminController@customerlist')->name('admin.customerlist');
        Route::get('managecustomers', 'AdminController@managecustomers')->name('admin.managecustomers');
        Route::get('manage_referal', 'AdminController@manage_referal')->name('admin.manage_referal');
        Route::get('manage/users/payment/{meter_no}', 'UserManagerController@customerPayment')->name('users.payment');
        Route::prefix('tickets')->group(function () {
            Route::get('/all-tickets', 'TicketsController@adminTickets')->name('admin.tickets');
            Route::get('/view/{ticket}', 'TicketsController@adminShowTicket')->name('admin.show-ticket');
            Route::post('close-ticket/{ticket}', 'TicketsController@closeTicket')->name('close-ticket');
        });
    });
});

Route::prefix('agent')->group(function () {
    Route::get('dashboard', 'AgentController@dashboard')->name('agent.dashboard');
    Route::get('profile', 'AgentController@profile')->name('agent.profile');
    Route::post('profile', 'AgentController@updateProfile')->name('agent.update');
    Route::get('payment-history', 'AgentController@paymentHistory')->name('agent.payHistory');
    Route::get('filter-by-date', 'AgentController@financeFilterDate');
    Route::get('meter-management', 'AgentController@meterManagement')->name('agent.meter');
    Route::post('meter-management', 'AccountController@postMeterRequest')->name('meter.post-request');
    Route::get('prepaid-token', 'AgentController@prepaidToken')->name('agent.prepaid-token');
    Route::get('postpaid-token', 'AgentController@postpaidToken')->name('agent.postpaid-token');
    Route::get('other-postpaid-payments', 'AgentController@otherPostpaid')->name('agent.other-postpaid');
    Route::get('check-admin-balance', 'AgentController@checkAdminBalance');
    Route::get('topup-agent/success/{amount}', 'AgentController@completeTopup');
    Route::get('payment-agent/{ref}/success', 'AgentController@agentTokenSuccess');
    Route::get('payment-agent-customer/{ref}/success', 'AgentController@agentCustomerTokenSuccess');

    Route::prefix('tickets')->group(function () {
        Route::get('/all', 'TicketsController@agentTickets')->name('agent.tickets');
        Route::get('/view/{ticket}', 'TicketsController@AgentShowTicket')->name('agent.show-ticket');
        Route::get('new-ticket', 'TicketsController@AgentOpenTicket')->name('agent.open-ticket');
        Route::post('new-ticket', 'TicketsController@AgentStoreTicket')->name('agent.store-ticket');
    });
});
// Agent APIs
Route::get('complete/agent-topup/{amount}', 'AgentController@completeTopup');

Route::prefix('distributor')->group(function () {
    Route::get('/', function () {
        return redirect()->route('backend-login');
    });
    Route::get('login', 'BackendController@getUserLogin')->name('backend-login');
    Route::post('login', 'BackendController@userLogin')->name('backend-login');
    // Administrator
    Route::get('distributor', 'DistributorController@home')->name('distributor.home');
    Route::get('finance', 'DistributorController@finance')->name('distributor.finance');
    Route::get('topup-tracker', 'DistributorController@topupTracker')->name('distributor.topup-tracker');
    Route::post('filter-by-date', 'DistributorController@financeFilterDate');
    Route::get('profile', 'DistributorController@profile')->name('distributor.profile');
    Route::get('customer_payment', 'DistributorController@customer_payment')->name('distributor.customer_payment');
    Route::get('demographics', 'DistributorController@demographics')->name('distributor.demographics');
    Route::get('meter_admin', 'DistributorController@meter_admin')->name('distributor.meter_admin');
    //Route::get('settings', 'DistributorController@settings')->name('admin.settings');
    Route::get('meter/change-status/{id}', 'DistributorController@getChangeStatus')->name('meter.change');
    Route::post('meter/change-status/{id}', 'DistributorController@postChangeStatus')->name('meter.update');
});

// Diamond APIS
// Initialize Access Token
Route::get('diamond/access-token', 'DiamondApiController@generateAccessToken');
// Admin Credit API
Route::get('diamond/credit/{amount}', 'DiamondApiController@credit');
/**
 * Diamond Api Agent 
 */
// Debit API
Route::get('diamond/debit/{amount}', 'DiamondApiController@agentDebit');

Route::post('wallets/credit', 'AgentController@creditWallets');
// Route::get('diamond/debit/admin/{accountnumber}/{amount}', 'DiamondApiController@adminDebit');

// End to End API
Route::get('e2e/api/customers', function () {
    $token = Input::get('token_access');
    if (empty($token)) return response()->json(['error' => 'Token not Provided'], 400);
    return User::where('role_id', 0)->get(['id', 'first_name']);
});


// Services 
Route::prefix('services')->group(function () {
    Route::get('ekedc', 'ServicesController@ekedc');
});
Route::post('logout', 'AccountController@logout')->middleware('auth')->name('logout');
Route::post('password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware(['guest', 'web']);
Route::get('password/reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware(['guest', 'web']);
Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset')->middleware(['guest', 'web']);
Route::post('password/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset')->middleware(['guest', 'web']);
// Auth::routes(['except' => ['register']]);

Route::get('login', function () {
    return redirect('/');
})->name('login');
Route::get('register', function () {
    return redirect('/');
})->name('register');


// Mobile Routes

Route::prefix('mobile')->group(function () {
    Route::get('/{path?}', function () {
        return view('mobile.mobile');
    })->where('path', '.*');
    // Route::get('/home', 'MobileController@index')->name('mobile.home');
    // Route::get('login', 'MobileController@login')->name('mobile.login');
    // Route::get('sign-up', 'MobileController@signUp')->name('mobile.sign-up');
    // Route::get('make-payment', 'MobileController@makePayment')->name('mobile.make-payment');
});

Route::post('/lists/services/', function (Request $request) {
    // return $request['keyword';
    return response()->json(DB::table('services_list')->where('title', 'LIKE', "$request->keyword" . "%")->get());
});
Route::get('/mobile-transaction/success/{user_type}/{ref}', 'AccountController@mobilePaymentSuccess');

Route::post('ussd/register', 'UssdController@register');

Route::get('ekedc', 'PagesController@disco');
Route::post('ekedc', 'PagesController@discoLogin')->name('disco-login');
Route::post('disco-logout', 'PagesController@discoLogout')->name('disco-logout');

Route::get('/nibbs-xml', function () {
    return view('test-xml-json');
});




/**
 * Nibbs Operation API Route
 */
Route::group(['prefix' => 'nibbs-payment'], function () {
    Route::post('create-mandate', 'API\NibbsController@createMandate');
    Route::post('validate-registration', 'API\NibbsController@validateOTPFresh');
    Route::post('generate-otp', 'API\NibbsController@generatePaymentOtp');
    Route::post('validate-otp', 'API\NibbsController@validatePaymentOtp');
    Route::post('post-nibbs-details', 'API\NibbsController@postDetails');
    Route::get('find-session', 'API\NibbsController@find');
});














































Route::prefix('uat-test')->group(function () {
    // Routes Goes Here
    Route::get('signon', 'UATController@signOn');
    // Route::get('validate-customer/{accountType}/{customerId}','UATController@validatePayment');
    Route::get('validate-customer', 'UATController@validateCustomer');
    Route::get('pay-order/', 'UATController@validatePayment');
    Route::get('charge-wallet/{amount}/{accountType}/{customerId}', 'UATController@chargeWallet');
    Route::get('generate-token/{number}', 'UATController@generateToken');
    Route::get('requery/{ref}/{orderid}', 'UATController@requeryToken');
    Route::get('notify-reversal', 'UATController@notifyReversal');
    Route::get('get-balance', 'UATController@getBalance');
});



/**
 * EKEDC Internal API Endpoint
 */
Route::prefix('ekedc')->group(function () {
    Route::get('signon', 'CIController@signOn');
    Route::get('validate-customer/{accountType}/{customerId}', 'CIController@validateCustomer');
    Route::get('validate-payment/{accountType}/{customerId}', 'CIController@validatePayment');
    Route::get('charge-wallet/{amount}/{accountType}/{customerId}', 'CIController@chargeWallet');
    Route::get('generate-token/{paymentRef}/{orderId}', 'CIController@generateToken');
    Route::post('pay-order', 'CIController@payOrderId');
});




















/**
 * NIBBS Web Routes
 */
Route::prefix('nibbs')->group(function () {
    Route::post('create-mandate', 'NIBBSController@createCurlMandate');
    Route::get('validate-otp/{otp}/{mandate}', 'NIBBSController@validateOtp');
    // Route::get('all-banks', 'NIBBSController@getHashValue');
    Route::get('all-banks', 'NIBBSController@getBanks');
    Route::get('callback', function () { });
    Route::get('try-form', 'NIBBSController@tryForm');
    Route::post('create-mandate', 'NIBBSController@createCurlMandate');
});





// Hold Generate Token Data
Route::post('gtk', 'AccountController@holdToken');
Route::get('transaction/success/{user_type}/{ref}', 'AccountController@paymentSuccess');
Route::get('transaction/{order_id}/{user_type}/receipt', 'AccountController@generateReceipt')->name('receipt');
Route::get('fetch/{order_id}/{user_type}', 'AccountController@fetchReceiptDetails');

// Route::get('base-64-decode/{string}','AccountController@decodeEmail');

Route::get('generate-password/{text}', function ($text) {
    return bcrypt($text);
});

/**
 * In API
 */
Route::get('profile/user/wb/{id}', 'ApiController@getUserWalletBalance');

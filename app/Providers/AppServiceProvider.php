<?php

namespace App\Providers;

use App\Payment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\User;
use Illuminate\Support\Facades\URL;
use Auth;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		\Schema::defaultStringLength(191);
		view()->composer('*', function ($view) {

			$current_route_name = \Request::route()->getName();
			$view->with('current_route_name', $current_route_name);

			if (auth()->check()) {
				$agent = User::where('id', auth()->id())->with('agent')->first();
				$view->with('agent_details', $agent);
			}

			// Payment Option blade component
			Blade::component('components.payment-options', 'pay');
			// Slider Component
			Blade::component('components.slider', 'slider');
			Blade::component('components.logged-in-payment-options', 'logged-pay');
		});
		// Sharing Customer Data Across Views
		view()->composer('customer/*', function ($view) {
			if (auth()->check()) {
				$customer = User::where('id', auth()->id())->with('customer')->first();
				//customer's wallet balance
				$myWallet = Auth::user()->customer->wallet_balance;
				$view->with('customer', $customer)->with('myWallet',$myWallet);
			}
		});


		// Force Https on Production
		// Force SSL in production
		// if ($this->app->environment() == 'production') {
		// 	URL::forceScheme('https');
		// }
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}

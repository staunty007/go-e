<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\User;

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

			// Customer

			// Payment Option blade component
			Blade::component('components.payment-options', 'pay');
			// Slider Component
			Blade::component('components.slider','slider');

		});
		// Sharing Customer Data Across Views
		view()->composer('customer/*', function($view){
			if(auth()->check()) {
				$customer = User::where('id',auth()->id())->with('customer')->first();
				$view->with('customer',$customer);
			}
		});
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

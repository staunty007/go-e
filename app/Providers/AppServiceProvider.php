<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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

			// Payment Option blade component
			Blade::component('components.payment-options', 'pay');
			// Slider Component
			Blade::component('components.slider','slider');

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

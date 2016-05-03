<?php

namespace App\Providers;
use App\Post;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		if (app()->environment('local')) {
			//show sql queries
			DB::listen(function ($db) {echo '<!--' . $db->sql . '-->' . PHP_EOL;});
		}
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}

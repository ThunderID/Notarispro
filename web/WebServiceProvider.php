<?php

namespace Thunderlabid\Web;

use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the Web services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the Web services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->bind('TAuth', 'Thunderlabid\Web\Queries\ACL\SessionBasedAuthenticator');
	}
}

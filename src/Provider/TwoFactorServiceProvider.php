<?php

namespace Shree\TwoFactor;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Shree\TwoFactor\Http\Middleware\TwoFactorVerification;

class TwoFactorServiceProvider extends ServiceProvider{
	public function boot(){
		$this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		$this->loadViewsFrom(__DIR__.'/resources/views','2fa');

		$router = $this->app->make(Router::class);
		$router->aliasMiddleware('TwoFactorVerification',TwoFactorVerification::class);

		if($this->app->runningInConsole()){
			//publish config file
			$this->publishes([__DIR__.'/../config/twoFactorConfig.php' => config_path('twoFactorConfig.php'),],'config');

			//publish migration file
			$this->publishes([__DIR__.'/../database/migrations/' => database_path('migrations'),],'migrations');

			//publish view files
			$this->publishes([__DIR__.'/../resources/views/' => resource_path('views/vendor/2fa'),],'views');
		}
	}

	public function register(){
		$this->mergeConfigFrom(__DIR__.'/config/twoFactorConfig.php','2fa');
	}
}
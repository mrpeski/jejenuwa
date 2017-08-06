<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use nuwa\Guana\Carriers\Maersk;
use nuwa\Guana\Carriers\Cosco;

use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('Maersk',  function($app){
            return new Maersk;
       });

       $this->app->bind('Cosco',  function($app){
            return new Cosco;
       });
    }
}

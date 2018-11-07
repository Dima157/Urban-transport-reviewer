<?php

namespace App\Providers;

use App\services\CSVService;
use Illuminate\Support\ServiceProvider;

class CSVServeceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*$this->app->register(CSVService::class, function($app){
            return new CSVService();
        });*/
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('csvservice', function(){
            return new CSVService();
        });
    }
}

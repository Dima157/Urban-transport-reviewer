<?php

namespace App\Providers;

use Google\Cloud\Vision\V1\ImageAnnotationContext;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Support\ServiceProvider;

class GoogleCloudeVisionProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('vision', function(){
           return new ImageAnnotatorClient();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

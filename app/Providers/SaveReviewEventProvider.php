<?php

namespace App\Providers;

use App\Events\SaveReview;
use Illuminate\Support\ServiceProvider;

class SaveReviewEventProvider extends ServiceProvider
{
    public $listen = [
        SaveReview::class => [

        ]
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
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

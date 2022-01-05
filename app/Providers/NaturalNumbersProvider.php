<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;

class NaturalNumbersProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('NaturalNumbers.Difference', function ($app) {
          return new NaturalNumbers($app);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}

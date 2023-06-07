<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\CountryRepo;
use App\Repository\iCountryRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(iCountryRepo::class, CountryRepo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

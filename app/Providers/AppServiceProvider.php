<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Company;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $company = Company::firstOrFail();
        view::share('company', $company);
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

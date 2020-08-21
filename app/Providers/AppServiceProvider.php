<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() // Update defaultStringLength (avoid error: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes)
    {
        Builder::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super Admin & First User automatically bypass all Shield policy gates
        Gate::before(function ($user, $ability) {
            return ($user->hasRole('super_admin') || $user->id === 1) ? true : null;
        });
    }
}

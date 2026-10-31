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
        // Prevent crashes if SQLite is selected but file is missing
        if (config('database.default') === 'sqlite') {
            $dbPath = config('database.connections.sqlite.database');
            if ($dbPath && !file_exists($dbPath) && is_writable(dirname($dbPath))) {
                @touch($dbPath);
            }
        }

        // Super Admin & First User automatically bypass all Shield policy gates
        Gate::before(function ($user, $ability) {
            return ($user->hasRole('super_admin') || $user->id === 1) ? true : null;
        });
    }
}

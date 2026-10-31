<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetFilamentLocale
{
    /**
     * Force Arabic locale for Filament Admin Panel to ensure RTL layout and Arabic interface.
     */
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale('ar');

        return $next($request);
    }
}

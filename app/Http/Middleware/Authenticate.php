<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            if(request()->is('admin') || request()->is('admin/*')){
                return route('admin.login');
            }
            else if(request()->is('vendor') || request()->is('vendor/*')){
                // return route('vendor.login');
            }
            else{
                return route('login');
            }
        }
    }
}

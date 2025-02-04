<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMerchant
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('merchant')->check()) {
            return redirect()->route('merchant.login');
        }

        return $next($request);
    }
}

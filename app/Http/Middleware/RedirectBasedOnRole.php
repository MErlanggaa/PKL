<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'erlangga') {
                return redirect()->route('dashboard.erlangga');
            } elseif ($role === 'hilmi') {
                return redirect()->route('dashboard.hilmi');
            }
        }

        return $next($request);
    }
}

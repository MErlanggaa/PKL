<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $rolesArray = explode(',', $roles);

        if (!Auth::check() || !in_array(Auth::user()->role, $rolesArray)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}

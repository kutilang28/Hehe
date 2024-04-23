<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
{
    // Check if the user is authenticated and if the user's role matches any of the specified roles
    if (auth()->check()) {
        $userRole = auth()->user()->role;

        if ($userRole !== null && in_array($userRole, $roles)) {
            return $next($request);
        }
    }

    // If the user is not authenticated or the role is null or does not match, redirect to the home page
    return redirect('/login');
}

}

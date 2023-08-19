<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserIsEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure authenticated
        $user = Auth::user();
        if ($user == null) {
            return redirect('/login')->with('error', 'Please log in first');
        }

        // Make sure the user is enabled
        if ($user->enabled == 0) {
            // Log user out
            Auth::logout();
            // Redirect with error
            return redirect('/login')
                ->with('error', 'Your account has been disabled.');
        }

        return $next($request);
    }
}

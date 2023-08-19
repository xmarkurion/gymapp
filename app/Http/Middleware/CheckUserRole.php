<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        $user = Auth::user();

        //If user role is not the role we are looking for
        if($role == null or $user->role != $role)
        {
            // If user is an admin just let him in.
            if($user->role == 'admin'){
                return $next($request);
            }
            return redirect('/home')->with('error', 'Access Denied!');
        }

        // If you get there means user has role and can access the site.
        return $next($request);
    }

}

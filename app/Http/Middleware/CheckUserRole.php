<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->roles === '1') {
            // Redirect to admin page
            return redirect('/admin');
        } elseif ($user && $user->roles === '2') {
            // Redirect to user page
            return redirect('/user');
        }

        return $next($request);
    }
}

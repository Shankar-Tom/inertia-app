<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Route::currentRouteName()=='login' || Route::currentRouteName()=='signup')
            {
                return redirect()->route('todos');
            }
            return $next($request);
        }
        return redirect('/')->with(['status'=>'danger','message'=>"Please Login first"]);
    }
}

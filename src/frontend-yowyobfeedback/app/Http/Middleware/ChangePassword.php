<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->session()->has('passwordMember') && $request->session()->get('passwordMember') != sha1("1234"))
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('settings');
        }

    }
}

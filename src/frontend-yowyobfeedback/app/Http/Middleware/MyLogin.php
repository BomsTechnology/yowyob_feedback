<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyLogin
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
        if( $request->session()->has('idMember') && $request->session()->has('nameMember') && $request->session()->has('passwordMember') && $request->session()->has('firstnameMember') && $request->session()->has('jobMember') && $request->session()->has('emailMember') && $request->session()->has('imageMember') && $request->session()->has('statusMember'))
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('mylogin');
        }

    }
}

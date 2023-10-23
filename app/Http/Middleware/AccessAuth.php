<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $RoleID)
    {
        if(auth()->user()->role_id != $RoleID){
            return redirect()->route('dashboard.index');
        }else{
            return $next($request);
        }
    }
}

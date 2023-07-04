<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $nameadmin = Admin::where($request->name,'name')->get() ;
        $passadmin = Admin::where($request->password,'password')->get() ;
        if(!$nameadmin){
            return 'no' ;
        }
        return $next($request);
        // return view('pages-login') ;
    }
}

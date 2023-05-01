<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChecksalaryMW
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
        if($request->age<30){
            return redirect('Contactus');
        }
        else{
            return $next($request);
        }
}
}

<?php

namespace App\Http\Middleware;

use Closure;
use session;
class UserLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (!session()->get('logedIn')){
            
            //return redirect('admin-login');
            return redirect()->back();
        }

            return $next($request);
        
    }



}

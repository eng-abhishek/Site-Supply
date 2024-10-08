<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminbasicAuth
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

        if(Auth::check()){

            if(auth::user()->role_id == 1){

                return redirect('admin-dashboard');

            }else{

                Auth::logout();
                return redirect('admin-login');
            }

        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginMiddleware
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
        if(Auth::check()){

            if($request->user())
            {
                $role_id = Auth::user()->role_id;

                if($role_id == 1){
                    $role = 'admin';
                }else{
                    $role = 'user';
                }

                if ($role_id){
                    return redirect($role.'/');
                }
                else{
                    return route('login');
                }
                
            }else{
                return route('login');
            }
        
        }
        return $next($request);
    }
}

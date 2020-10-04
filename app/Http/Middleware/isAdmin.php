<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if (Auth::check()){
            $user= Auth::user();
            if ($user->isManager() && $user->status===1 && $user->admin_active===1){
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect()->route('auth.login');
        }
       // return $next($request);
    }
}

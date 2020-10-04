<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (Auth::check()){
            $user= Auth::user();
            if ($user->isEditor($role) && $user->status===1 && $user->admin_active===1){
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect()->route('auth.login');
        }
    }
}

<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('admin.get.login');
    //     }
    // }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
             return redirect()->route('admin.get.login');
        }

        $user = Auth::user(); // lay thong tin user dang nhap

        // kiem tra quyen
        $route = $request->route()->getName();
        // dd($user->can($route));
        if($user->cant($route)){
            return redirect()->route('admin.get.error',['code' => '403']);
        }

        return $next($request);
       
    }
}

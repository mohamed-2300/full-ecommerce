<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = Auth::user();
            
            if($user->isAdmin()){
                return $next($request);
            }else if ($user->isEditor()) {
                return redirect(route('editor_dashboard'));
            }else{
                return redirect(route('home'));
            }
        }
        abort(403);
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class CheckAuthMiddleware
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
        $user_info = Auth::User();  
        if (Auth::check() && $user_info->status == 'unactive') {
            return redirect()->back()->with('errorMessage', 'Tài khoản không được hỗ trợ hoặc đã bị xóa!');
        } else {
            return $next($request);
        }
    }
}

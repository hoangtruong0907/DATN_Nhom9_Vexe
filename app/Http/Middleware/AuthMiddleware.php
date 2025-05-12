<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == '2') {
                // Nếu người dùng có vai trò '2', cho phép truy cập
                return $next($request);
            } else {
                Auth::logout();
                toastr()->error('Tài khoản này không có quyền truy cập!');
                return redirect()->route('admin.login.index');
            }
        }

        // Nếu người dùng chưa đăng nhập
        return redirect()->route('admin.login.index')->with('error', 'Vui lòng đăng nhập để sử dụng!');
    }
}

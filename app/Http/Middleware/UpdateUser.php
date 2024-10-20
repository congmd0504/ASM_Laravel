<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('user')->id;
        if(Auth::user()->role == "user"){
            return redirect()->route('admin.user')->with('error', 'Bạn không có quyền edit !');
        }
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.user')->with('error', 'Bạn không thể edit bản thân !');
        }
        return $next($request);
    }
}

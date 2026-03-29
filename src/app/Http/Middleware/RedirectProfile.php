<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($request->is('mypage/profile')) { return $next($request); }

        // ログインしていて、プロフィール未設定ならリダイレクト
        if ($user && !$user->profile_completed) {
            return redirect('/mypage/profile');
        }

        return $next($request);
    }

}

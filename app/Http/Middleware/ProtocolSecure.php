<?php

namespace App\Http\Middleware;

use Closure;


class ProtocolSecure
{
    /**
     * SSL化を行う
     *
     * @param [type] $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {
        // 本番環境 httpsにリダイレクト
        if (env('APP_ENV') === 'production') {
            return redirect()->secure($request->getRequestUri(), 301);
        }

        return $next($request);
    }

}
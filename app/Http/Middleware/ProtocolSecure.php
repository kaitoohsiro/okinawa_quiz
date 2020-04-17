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
        if (config('app.env') === 'production') {
            return redirect('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        }

        return $next($request);
    }

}
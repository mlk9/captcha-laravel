<?php

namespace Mlk9\Captcha\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaMiddleware
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
        /* check captcha isset */
        if(!isset($request->captcha))
        {
            return back()->withErrors(__('captcha.please_enter_captcha'));
        }
        /*  is valid or not */
        if(!app('captcha')->isValid($request->captcha))
        {
            return back()->withErrors(__('captcha.wrong_captcha'));
        }

        return $next($request);
    }
}

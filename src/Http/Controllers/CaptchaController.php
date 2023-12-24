<?php

namespace Mlk9\Captcha\Http\Controllers;

use Illuminate\Routing\Controller;
use Mlk9\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{
    /**
     * captcha generate
     *
     * @return void
     */
    public function image()
    {
        $captcha = Captcha::generate()->image;
        return response(base64_decode($captcha),200,['Content-Type' => 'image/png']);
    }
}
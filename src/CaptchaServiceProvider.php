<?php

namespace Mlk9\Captcha;

use Mlk9\Captcha\Captcha;

class CaptchaServiceProvider
{
    public $bindings = [
        Captcha::class => Captcha::class,
    ];
}
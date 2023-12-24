<?php

namespace Mlk9\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Captcha is a facade for the `Captcha` implementation access.
 *
 * @see \Mlk9\Captcha\Captcha
 * @method static object generate()
 * @method static boolean isValid(string $captcha)
 */
class Captcha extends Facade
{

    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }

}

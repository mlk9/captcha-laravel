<?php

namespace Mlk9\CaptchaPackage\Tests\Feature;

use Mlk9\CaptchaPackage\Tests\TestCase;

class RefreshTest extends TestCase
{
    public function test_refresh(): void
    {
        $this->get(route('captcha.image'))->assertHeader('Content-type', 'image/png');
    }
}

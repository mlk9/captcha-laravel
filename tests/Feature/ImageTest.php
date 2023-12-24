<?php

namespace Mlk9\CaptchaPackage\Tests\Feature;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Mlk9\Captcha\Facades\Captcha;
use Mlk9\CaptchaPackage\Tests\TestCase;

class ImageTest extends TestCase
{
    public function test_generate(): void
    {
        $captcha = Captcha::generate();
        $manager = new ImageManager(new Driver());
        $image = $manager->read($captcha->image);
        $this->assertTrue($image->width() === config('captcha.width', 160));
        $this->assertTrue($image->height() === config('captcha.height', 60));
        $this->assertTrue(Captcha::isValid($captcha->code));
    }
}

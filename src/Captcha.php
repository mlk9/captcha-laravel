<?php

namespace Mlk9\Captcha;

use Illuminate\Support\Facades\Session;

class Captcha
{
    /**
     * Generate captcha
     *
     * @return string image
     */
    public function generate()
    {
        $count = config('captcha.count', 6);
        $colors = config('captcha.colors', [[90,90,90]]);
        $backgorunds = config('captcha.backgorunds', ["data:image/png;base64,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"]);
        $captcha_num = config('captcha.char', '1234567890abcdefghijklmnopqrstuvwxyz');
        $captcha_num = substr(str_shuffle($captcha_num), 0, $count);
        Session::put('captcha-hex', md5($captcha_num));
        $image = ImageCreateFromPNG($backgorunds[rand(0, count($backgorunds))]);
        $image =imagecrop($image, ['width'=>36*$count,'height'=>60,'x'=>0,'y'=>0]);
        imagecolorallocate($image, 255, 255, 255); // set background color
        $font = config('captcha.font', public_path('vendor/captcha/fonts/tahoma.ttf'));
        for ($i=1;$i<$count+1;$i++) {
            $color = $colors[rand(0, count($colors))];
            $text_color = imagecolorallocate($image, $color[0], $color[1], $color[2]); // set captcha text color
            $char = substr($captcha_num, $i-1, 1);
            imagettftext($image, rand(16, 22), rand(0, 30), $i*30, 40, $text_color, $font, $char);
        }
        ob_start();
        ImagePng($image);
        return "data:image/png;base64,".base64_encode(ob_get_clean());
    }

    /**
     * Check this captcha correct or not
     *
     * @param string $captcha
     * @return boolean
     */
    public function isValid($captcha)
    {
        if (md5($captcha)==Session::get('captcha-hex')) {
            return true;
        }

        return false;
    }
}

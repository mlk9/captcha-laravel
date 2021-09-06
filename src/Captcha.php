<?php

namespace Mlk9\Captcha;

class Captcha
{
    public function generate()
    {
        $captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz0123456789';
        $captcha_num = substr(str_shuffle($captcha_num), 0, 6);
        $font_size = 30;
        $img_width = 70;
        $img_height = 40;
        $image = imagecreate($img_width, $img_height); // create background image with dimensions
        imagecolorallocate($image, 255, 255, 255); // set background color
        $text_color = imagecolorallocate($image, 0, 0, 0); // set captcha text color
        imagettftext($image, $font_size, 0, 15, 30, $text_color, 'tahoma', $captcha_num);
        return imagejpeg($image);
    }
}
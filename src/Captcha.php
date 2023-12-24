<?php

namespace Mlk9\Captcha;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
/**
 * Captcha class
 */
class Captcha
{
    /**
     * default Backgrounds variable
     *
     * @var array
     */
    protected $defaultBackgrounds = [
        __DIR__ . "/Backgrounds/1.png",
        __DIR__ . "/Backgrounds/2.png",
        __DIR__ . "/Backgrounds/3.png",
        __DIR__ . "/Backgrounds/4.png",
        __DIR__ . "/Backgrounds/5.png",
    ];

    /**
     * default Colors variable
     *
     * @var array
     */
    protected $defaultColors = [
        "#111827", // Gray
        "#000000", // Black
        "#7f1d1d", // Red
        "#14532d", // Dark Green
        "#1e3a8a", // Blue
        "#831843", // Pink
        "#581c87", // Purple
    ];

    /**
     * Generate captcha
     *
     * @return string image
     */
    public function generate(): object
    {
        /* check gd extention enabled */
        if (extension_loaded('gd') === false) {
            throw new \Exception('Please enable GD extention in PHP.');
        }
        /* get length chars */
        $length = config('captcha.length', 6);
        /* get colors */
        $colors = config('captcha.colors', $this->defaultColors);
        /* get backgrounds */
        $backgorunds = array_merge($this->defaultBackgrounds, config("captcha.backgrounds", []));
        /* get char */
        $captcha = config('captcha.char', '1234567890abcdefghijklmnopqrstuvwxyz');
        /* select random */
        $captcha = substr(str_shuffle($captcha), 0, $length);
        /* put captcha to session hashed */
        switch (config('captcha.hash_type', 'laravel')) {
            case 'laravel':
                Session::put('captcha-hex', Hash::make($captcha));
                break;
            case 'md5':
                Session::put('captcha-hex', hash("md5", $captcha));
                break;
            case 'sha256':
                Session::put('captcha-hex', hash("sha256", $captcha));
                break;
            default:
                Session::put('captcha-hex', Hash::make($captcha));
                break;
        }
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image = $manager->read(__DIR__ . "/Backgrounds/white.png");
        // resize image proportionally to 300px width
        $image->crop(width: 33.333 * $length, height: 60, offset_x: 0, offset_y: 0);
        // write text at a certain position
        for ($i = 1; $i < $length + 1; $i++) {
            $char = substr($captcha, $i - 1, 1);
            $image->text($char, $i * 30, 30, function ($font) use ($colors) {
                $fontFile = config('captcha.font', null);
                $font->filename(is_null($fontFile) ? __DIR__ . '/../resources/fonts/tahoma.ttf' : (typeof($fontFile) == 'array' ? Arr::random($fontFile) : $fontFile));
                $font->color(Arr::random($colors));
                $font->size(rand(22, 36));
                $font->align('center');
                $font->valign('middle');
                $font->lineHeight(1);
                $font->angle(rand(0, 30));
            });
        }

        $image->place(Arr::random($backgorunds));

        $image->resize(config('captcha.width', 160), config('captcha.height', 60));
        // save modified image in new format
        return (object) [
            'code' => $captcha,
            'image' => $image->toPng()->toDataUri(),
        ];
    }

    /**
     * Check this captcha correct or not
     *
     * @param string $captcha
     * @return boolean
     */
    public function isValid($captcha)
    {
        $condition = false;

        if (is_null(Session::get('captcha-hex'))) {
            return false;
        }

        /* check cpatcha */
        switch (config('captcha.hash_type', 'laravel')) {
            case 'laravel':
                $condition = Hash::check($captcha, Session::get('captcha-hex'));
                break;
            case 'md5':
                $condition = hash("md5", $captcha) == Session::get('captcha-hex');
                break;
            case 'sha256':
                $condition = hash("sha256", $captcha) == Session::get('captcha-hex');
                break;
            default:
                $condition = Hash::check($captcha, Session::get('captcha-hex'));
                break;
        }

        return $condition;
    }
}

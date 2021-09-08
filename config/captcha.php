<?php

return [
    /**
     * add additional backgrounds just png files url or base64
     */
    'backgrounds' => [],
    /**
     * set char uses in captcha
     */
    'char' => '1234567890abcdefghijklmnopqrstuvwxyz',
    /**
     * count chart print
     */
    'count' => 6,
    /**
     * font
     */
    'font' => public_path('vendor/captcha/fonts/tahoma.ttf'),
    /**
     * colors
     */
    'colors' => [
        [40,40,40], // Gray
        [0,0,0], // Black
        [237,41,57], // Red
        [0,176,24], // Dark Green
        [0,43,198], // Blue
    ],
     /**
     * size from resize
     */
    'width' => 200,
    'height' => 40,

];

<?php

return [
    /**
     * add additional backgrounds : 
     * - Path in filesystem
     * - File Pointer resource
     * - SplFileInfo object
     * - Raw binary image data
     * - Base64 encoded image data
     * - Data Uri
     */
    'backgrounds' => [],
    /**
     * set char uses in captcha
     */
    'char' => '1234567890abcdefghijklmnopqrstuvwxyz',
    /**
     * length char print
     */
    'length' => 6,
    /**
     * font 
     * - array random
     * - string
     * - null : Default Tahoma
     */
    'font' => null,
    /**
     * colors
     */
    'colors' => [
        "#111827", // Gray
        "#000000", // Black
        "#7f1d1d", // Red
        "#14532d", // Dark Green
        "#1e3a8a", // Blue
        "#831843", // Pink
        "#581c87", // Purple
    ],
    /**
     * size from resize
     */
    'width' => 160,
    'height' => 60,
    /**
     * hash_type
     * - laravel
     * - md5
     * - sha256
     */
    'hash_type' => 'laravel',
];

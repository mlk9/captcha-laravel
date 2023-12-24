<?php

use Illuminate\Support\Facades\Route;
use Mlk9\Captcha\Http\Controllers\CaptchaController;

Route::get('/captcha-image', [CaptchaController::class, 'image'])->name('captcha.image');

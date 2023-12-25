# Captcha Laravel

image captcha for Laravel

- works with session
- generates image your custom

Persian Docs for V2 :
<https://vrgl.ir/WQXCT>

# Installation

you can install this package via composer

```sh
composer require mlk9/captcha-laravel
```

then publish vendor

```sh
php artisan vendor:publish --tag=captcha-laravel
```

# Documents

## Configure

- type (array , [char, math])
- backgrounds (array)
- char (string)
- length (int)
- font (string|array)
- colors (array)
- width (int)
- height (int)
- type_hash ([laravel, sha256, md5])

## Generate captcha simple

you can use component:

```sh
<x-captcha-box /> 
<x-captcha-box-refresh />  //via refresh
```

or create custom like this:

```sh
<div>
    <div>
        <div>
             <!-- Captcha generate -->
            <img src="{{ \Mlk9\Captcha\Facades\Captcha::generate()->image }}" alt="captha"> 
        </div>
  <div>
   <div>{{ __('captcha.captcha') }}</div>
   <input id="captcha" name="captcha" type="text" required autocomplete="off">
  </div>
 </div>
</div>
```

## Validation

You can use `captcha` rule in your validations

```php
Illuminate\Support\Facades\Validator::validate($request->all(),
    ["captchaField"=>"captcha"]
);
```

#### also

you can add middleware ```captcha``` to your routes or controllers

and the third way use ```isValid(string: entry)``` from ```\Mlk9\Captcha\Facades\Captcha::class``` for example :

```sh
if(!\Mlk9\Captcha\Facades\Captcha::isValid($request->captcha))
{
    return back()->withErrors('Wrong Captcha');
}
```

## notice for v2

if you get error for font you can replace in config
`'font' => public_path('vendor/captcha/fonts/tahoma.ttf'),`

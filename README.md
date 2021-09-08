# Captcha Laravel
image captcha for Laravel 6+
- works with session
- generates image your custom
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
- backgrounds (array)
- char (string) 
- count (int)
- font (string)
- colors (array [r,g,b])
- width (int)
- height (int)
## Generate captcha
you can use component:
```sh
<x-captcha-box />
```
or create custom like this:
```sh
<div>
    <div>
        <div>
             <!-- Captcha generate -->
            <img src="{{ app('captcha')->generate() }}" alt="captha"> 
        </div>
		<div>
			<div>{{ __('captcha.captcha') }}</div>
			<input id="captcha" name="captcha" type="text" required autocomplete="off">
		</div>
	</div>
</div>
```
## Validation
You can use `captch` rule in your validations

```php
Illuminate\Support\Facades\Validator::validate($request->all(),
    ["captchaField"=>"captcha"]
);
```

#### also
you can add middleware ```captcha``` to your routes or controllers

and the third way use ```isValid(string: entry)``` from ```app('captcha')``` for example :
```sh
if(!app('captcha')->isValid($request->captcha))
{
    return back()->withErrors('Wrong Captcha');
}
```
## Language Key
- `captcha.captcha`
- `captcha.please_enter_captcha`
- `captcha.wrong_captcha`

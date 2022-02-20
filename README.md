# Captcha Laravel
image captcha for Laravel
- works with session
- generates image your custom

Persian Docs :
https://vrgl.ir/WQXCT

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
## Notice
if you get error for font you can replace in config
`'font' => public_path('vendor/captcha/fonts/tahoma.ttf'),`
## Configure
- backgrounds (array)
- char (string) 
- length (int)
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
You can use `captcha` rule in your validations

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
## Refresh captcha (this is idea for you)
#### Method 1 (JS-Jquery)
- Create route (Get method) and return `app('captcha')->generate()`
- Make button (`id:refresh_captcha`)
- with Jquery or any send request to the route and return response in `#captcha` image like this `<img src="%res%">` 
#### Method 2 (VueJs)
- please see vuejs docs
#### Method 3 (Livewire)
- please see livewire docs
## Language Key
- `captcha.captcha`
- `captcha.please_enter_captcha`
- `captcha.wrong_captcha`

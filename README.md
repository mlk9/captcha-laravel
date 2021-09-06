# Captcha Laravel
image captcha for Laravel 6+
# Installation
```sh
composer require mlk9/captcha-laravel
```
vendor public
```sh
php artisan vendor:publish --tag=captcha-laravel
```
# Documents
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
			<div>{{ __('Captcha') }}</div>
			<input id="captcha" name="captcha" type="text" required autocomplete="off">
		</div>
	</div>
</div>
```
## Validation
you can add middleware ```captcha``` to your routes or controllers, the second way use ```isValid(string: entry)``` from ```app('captcha')``` for example :
```sh
if(!app('captcha')->isValid($request->captcha))
{
    return back()->withErrors('Wrong Captcha');
}
```
## Language Key
- `Captcha`
- `Please_enter_captcha`
- `Wrong_captcha`

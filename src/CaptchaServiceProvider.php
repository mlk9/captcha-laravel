<?php

namespace Mlk9\Captcha;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Mlk9\Captcha\Facades\Captcha as CaptchaFacade;
use Mlk9\Captcha\Http\Middleware\CaptchaMiddleware;

class CaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/captcha.php', 'captcha');
        $this->app->singleton(CaptchaFacade::class, Captcha::class);
        app('router')->aliasMiddleware('captcha', CaptchaMiddleware::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Captcha::class];
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'captcha');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->configureComponents();
        $langDir = 
        $this->publishes([
            __DIR__.'/../config/captcha.php' => config_path('captcha.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/captcha'),
            __DIR__.'/../lang' => is_dir(resource_path('lang')) ? resource_path('lang') : base_path('lang'),   
        ], 'captcha-laravel');
        $this->ExtendValidation();
    }

    /**
     * Configure the Captcha Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('box');
            $this->registerComponent('box-refresh');
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('captcha::components.'.$component, 'captcha-'.$component);
    }

    /**
     * Add Captcha validation rule
     * @return void
     */
    protected function ExtendValidation(): void
    {
        Validator::extend("captcha",function ($attr,$value){
            return app("captcha")->isValid($value);
        },__('captcha.wrong_captcha'));
    }
}

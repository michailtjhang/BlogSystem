<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layouts.app', function ($view) {
            $configKey = [
                'logo',
                'blogname',
                'title',
                'caption',
                'ads_header',
                'ads_footer',
                'footer',
            ];

            $config = Config::whereIn('name', $configKey)->pluck('value', 'name');

            $view->with('config', $config);
        });
        View::composer('front.home.contact', function ($view) {
            $configKey = [
                'phone',
                'email',
                'facebook',
                'instagram',
                'youtube',
            ];

            $config = Config::whereIn('name', $configKey)->pluck('value', 'name');

            $view->with('config', $config);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class SideWidgetProvider extends ServiceProvider
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
        View::composer('front.layouts.side-widget', function ($view) {
            $categories = Category::latest()->get();
            $view->with('categories', $categories);
        });

        View::composer('front.layouts.navigation', function ($view) {
            $categories = Category::latest()->take(3)->get();
            $view->with('categori_navbar', $categories);
        });
    }
}

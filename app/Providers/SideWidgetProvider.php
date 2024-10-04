<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\View;
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
            $categories = Category::withCount(['articles' => function (Builder $query) {
                $query->whereStatus(1);
            }])->latest()->get();
            
            $view->with('categories', $categories);
        });

        View::composer('front.layouts.side-widget', function ($view) {
            $popular_articles = Article::whereStatus(1)->orderBy('views', 'desc')->take(3)->get();
            $view->with('popular_articles', $popular_articles);
        });

        View::composer('front.layouts.navigation', function ($view) {
            $categories = Category::latest()->take(3)->get();
            $view->with('categori_navbar', $categories);
        });
    }
}

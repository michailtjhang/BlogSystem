<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $keywords = request()->keyword;
        if ($keywords) {
            $articles = Article::with('category')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keywords . '%')
                ->latest()
                ->paginate(6);
        } else {
            $articles = Article::with('category')
                ->whereStatus(1)
                ->latest()
                ->paginate(6);
        }

        return view('front.home.index',[
            'page_title' => 'Home Blog',
            'last_articles' => Article::whereStatus(1)->latest()->first(),
            'articles' => $articles,
            'categories' => Category::latest()->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $keywords = request()->keyword;
        if ($keywords) {
            $articles = Article::with('category')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keywords . '%')
                ->latest()
                ->paginate(9);
        } else {
            $articles = Article::with('category')
                ->whereStatus(1)
                ->latest()
                ->paginate(9);
        }

        return view('front.article.index', [
            'page_title' => 'Articles',
            'articles' => $articles,
            'keywords' => $keywords
        ]);
    }

    public function show($slug)    
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $article->increment('views');
        return view('front.article.show', [
            'page_title' => $article->title,
            'article' => $article,
        ]);
    }
}

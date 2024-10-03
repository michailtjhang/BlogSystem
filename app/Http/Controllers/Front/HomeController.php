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
        return view('front.home.index',[
            'page_title' => 'Home Blog',
            'last_articles' => Article::whereStatus(1)->latest()->first(),
            'articles' => Article::whereStatus(1)->latest()->paginate(6),
            'categories' => Category::latest()->get(),
        ]);
    }
}

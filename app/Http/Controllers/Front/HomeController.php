<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index',[
            'page_title' => 'Home Blog',
            'last_articles' => Article::whereStatus(1)->latest()->first(),
            'articles' => Article::whereStatus(1)->latest()->paginate(6),
        ]);
    }

    public function about()
    {
        return view('front.home.about', [
            'page_title' => 'About',
        ]);
    }

    public function contact()
    {
        return view('front.home.contact', [
            'page_title' => 'Contact',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard', [
            'page_title' => 'Dashboard',
            'total_article' => Article::count(),
            'total_category' => Category::count(),
            'last_article' => Article::with('category')->whereStatus(1)->latest()->limit(5)->get(),
            'popular_article' => Article::with('category')->whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get()
        ]);
    }
}

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
            'last_article' => Article::latest()->with('category')->whereStatus(1)->limit(5)->get(),
            'popular_article' => Article::orderBy('views', 'DESC')->with('category')->whereStatus(1)->limit(5)->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function index($slugCategory)
    {
        return view('front.category.index', [
            'page_title' => 'Category ' . $slugCategory,
            'articles' => Article::with('category')->whereHas('category', function($q) use ($slugCategory) {
                $q->where('slug', $slugCategory)
                    ->where('status', 1);
            })->latest()->paginate(9),
            'categories' => $slugCategory
        ]);
    }
    public function allCategory()
    {
        $categories = Category::withCount(['articles' => function (Builder $query) {
            $query->whereStatus(1);
        }])->latest()->get();
        return view('front.category.all-category', [
            'page_title' => 'All Category',
            'categories' => $categories
        ]);
    }
}

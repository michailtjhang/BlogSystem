<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generate()
    {
        // Membuat instance Sitemap
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create(route('about')))
            ->add(Url::create(route('contact')));

        // Menambahkan artikel dinamis
        $articles = Article::where('status', 1)->get();
        foreach ($articles as $article) {
            $sitemap->add(
                Url::create(route('p', $article->slug))
                    ->setLastModificationDate($article->updated_at ?? Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // Menambahkan kategori dinamis
        $categories = Category::where('status', 1)->get();
        foreach ($categories as $category) {
            $sitemap->add(
                Url::create(route('category', $category->slug))
                    ->setLastModificationDate($category->updated_at ?? Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        // Menyimpan sitemap ke dalam public folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json(['message' => 'Sitemap generated successfully!']);
    }
}

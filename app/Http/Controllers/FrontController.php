<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\ArticleNews;
use App\Models\BannerAds;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();

        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(10)
        ->get();

        $authors = Author::all();

        $bannerads = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->take(2)
        ->get();

        $entertainment_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(7)
        ->get();

        $entertainment_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        $finance_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Finance');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(7)
        ->get();

        $finance_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Finance');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        $politics_article = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Politics');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(7)
        ->get();

        $politics_featured_article = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Politics');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        return view('front.index', compact('politics_featured_article','politics_article','finance_featured_articles','finance_articles', 'entertainment_featured_articles', 'entertainment_articles', 'categories', 'articles', 'authors',
        'featured_articles', 'bannerads'));
    }

    public function category(Category $category){
        $categories = Category::all();
        $bannerads = BannerAds::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();
        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function author(Author $author){
        $categories = Category::all();
        $bannerads = BannerAds::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();
        return view('front.author', compact('categories', 'author', 'bannerads'));
    }

    public function search(Request $request){
        $request->validate([
            'keyword' => ['required', 'string', 'max:225'],
        ]);

        $categories = Category::all();

        $keyword = $request->keyword;

        $articles = ArticleNews::with(['category', 'author'])
        ->where('name', 'like', '%' . $keyword . '%')->paginate(6);

        return view('front.search', compact('articles', 'keyword', 'categories'));
    }

    public function details(ArticleNews $articleNews){
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->where('id', '!=', $articleNews->id)
        ->latest()
        ->take(3)
        ->get();

        $bannerads = BannerAds::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        $square_ads = BannerAds::where('type', 'square')
        ->where('is_active', 'active')
        ->inRandomOrder()
        ->take(2)
        ->get();

        if ($square_ads->count() < 2) {
            $square_ads_1 = $square_ads->first();
            $square_ads_2 = null;
        } else {
            $square_ads_1 = $square_ads->get(0);
            $square_ads_2 = $square_ads->get(1);
        }

        $author_news = ArticleNews::where('author_id', $articleNews->author_id)
        ->where('id', '!=', $articleNews->id)
        ->latest()
        ->take(7)
        ->get();

        return view('front.details', compact('author_news','square_ads_1', 'square_ads_2','articleNews', 'categories', 'articles', 'bannerads'));
    }

    public function tentang() {
    $categories = Category::all();
    return view('front.tentang', compact('categories'));
}


}

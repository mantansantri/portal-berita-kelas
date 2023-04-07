<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FrontEndController extends Controller
{
    public function index()
    {
        $title = "Welcome to ZenBlog";
        $news = News::latest()->get();
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

       return view('frontend.index', compact('news', 'nav_category', 'side_news', 'title'));
    }

    public function detailCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $text = Category::findOrFail($category->id)->name;
        $title = "Detail Category -";
        $news = News::where('category_id', $category->id)->paginate(10);
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.detail-category', compact('news', 'nav_category', 'side_news', 'title'));

    }

    public function detailNews($slug)
    {
        $news = News::where('slug', $slug)->first();
        $text = News::findOrFail($news->id)->title;
        $title = "News - $text";
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.detail-news', compact('news', 'nav_category', 'side_news', 'title'));
    }

    public function searchNewsEnd(Request $request)
    {
        $keyword = $request->keyword;
        $news = News::where('title', 'like', '%' . $keyword . '%')->paginate(10);
        $title = "Welcome to ZenBlog";
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.index', compact('news', 'title', 'nav_category', 'side_news'));
    }

}

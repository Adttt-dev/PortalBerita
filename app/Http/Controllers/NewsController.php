<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        // Fetch the news item by slug
        $news = News::where('slug', $slug)->first();
        $newsts = News::orderBy('created_at', 'desc')->take(4)->get();
        // Return the view with the news item
        return view('pages.news.show', compact('news', 'newsts'));
    }

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->first();
        return view('pages.news.category', compact('category'));
    }
}

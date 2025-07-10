<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Baner;
use App\Models\News;

use Illuminate\Http\Request;

class LandingController extends Controller 
{
    public function index()
    {
        $baners = Baner::all();  
        $featureds = News::where('is_featured', true)->get();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();
        $authors = Author::all()->take(5);
        return view('pages.landing', compact('baners', 'featureds', 'news', 'authors'));
    }
}

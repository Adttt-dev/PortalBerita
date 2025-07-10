<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($username)
    {
        // Fetch the author by slug
        $author = Author::where('username', $username)->first();
        // Fetch news articles by the author
        // $news = $author->news()->orderBy('created_at', 'desc')->paginate(10);
        // Return the view with the author and their news articles
        return view('pages.author.show', compact('author',));
    }
}

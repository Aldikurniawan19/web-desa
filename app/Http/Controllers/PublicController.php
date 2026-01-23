<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $latest_articles = Article::with('user')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('public.home', compact('latest_articles'));
    }

    public function showBerita($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $other_articles = Article::where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        return view('public.berita.show', compact('article', 'other_articles'));
    }
}

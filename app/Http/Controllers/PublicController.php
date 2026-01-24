<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\VillageProfile;
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

    public function sejarah()
    {
        $profile = VillageProfile::first();
        return view('public.profil.sejarah', compact('profile'));
    }

    public function visiMisi()
    {
        $profile = VillageProfile::first();
        return view('public.profil.visi-misi', compact('profile'));
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

    public function articles(Request $request)
    {
        $query = Article::with('user')->where('status', 'published');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $articles = $query->latest()->paginate(5);

        return view('public.berita.index', compact('articles'));
    }
}

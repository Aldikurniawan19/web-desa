<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'category' => 'required|in:berita,pengumuman,agenda',
            'status' => 'required|in:draft,published',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->input('content'),
            'excerpt' => Str::limit(strip_tags($request->input('content')), 150),
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'category' => $request->category,
            'status' => $request->status,
        ]);

        return redirect()->route('articles.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:berita,pengumuman,agenda',
            'status' => 'required|in:draft,published',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->input('content'),
            'excerpt' => Str::limit(strip_tags($request->input('content')), 150),
            'category' => $request->category,
            'status' => $request->status,
        ];


        if ($request->title != $article->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Berita berhasil dihapus!');
    }
}

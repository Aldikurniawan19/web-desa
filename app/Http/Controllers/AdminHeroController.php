<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHeroController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::latest()->get();
        return view('admin.hero.index', compact('slides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('hero-slides', 'public');

        HeroSlide::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $path,
        ]);

        return back()->with('success', 'Slide berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $slide = HeroSlide::findOrFail($id);

        if (Storage::exists('public/' . $slide->image)) {
            Storage::delete('public/' . $slide->image);
        }

        $slide->delete();
        return back()->with('success', 'Slide dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dbSlides = HeroSlide::latest()->get();

        $latest_articles = Article::with('user')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $slides = $dbSlides->map(function ($slide) {
            return [
                'img' => asset('storage/' . $slide->image),
                'title' => $slide->title,
                'subtitle' => $slide->subtitle
            ];
        });

        if ($slides->isEmpty()) {
            $slides = collect([
                [
                    'img' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
                    'title' => 'Selamat Datang di Desa Digital',
                    'subtitle' => 'Menuju Desa Mandiri, Sejahtera, dan Berbudaya'
                ],
                [
                    'img' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
                    'title' => 'Pelayanan Publik Digital',
                    'subtitle' => 'Urus surat menyurat kini lebih mudah dari rumah'
                ]
            ]);
        }

        return view('public.home', compact('slides', 'latest_articles'));
    }
}

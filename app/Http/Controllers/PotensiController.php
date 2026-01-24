<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->get();
        return view('public.potensi.index', compact('potensi'));
    }
}

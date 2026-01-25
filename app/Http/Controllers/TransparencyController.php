<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function apbdes()
    {
        return view('public.transparansi.apbdes');
    }

    public function realisasi()
    {
        return view('public.transparansi.realisasi');
    }

    public function laporan()
    {
        return view('public.transparansi.laporan');
    }

    public function program()
    {
        return view('public.transparansi.program');
    }
}

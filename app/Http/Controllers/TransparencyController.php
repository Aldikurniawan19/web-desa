<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function apbdes()
    {
        $year = date('Y');
        $data = Apbdes::where('tahun', $year)->first();

        if (!$data) {
            $data = Apbdes::orderBy('tahun', 'desc')->first();
        }

        return view('public.transparansi.apbdes', compact('data'));
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

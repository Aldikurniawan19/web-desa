<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function sejarah()
    {
        return view('public.profil.sejarah');
    }

    public function visiMisi()
    {
        return view('public.profil.visi-misi');
    }
}

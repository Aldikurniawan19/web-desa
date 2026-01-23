<?php

namespace App\Http\Controllers;

use App\Models\LetterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterRequestController extends Controller
{
    public function index()
    {
        $letters = LetterRequest::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('public.layanan.index', compact('letters'));
    }

    public function create()
    {
        return view('public.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'purpose' => 'required|string|max:255',
            'attachment' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments', 'public');
        }

        LetterRequest::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'purpose' => $request->purpose,
            'attachment' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('layanan.index')->with('success', 'Permohonan surat berhasil dikirim! Mohon tunggu verifikasi admin.');
    }
}

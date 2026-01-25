<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('public.layanan.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'category' => 'required',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        // LOGIKA BARU: Jika user sedang login, simpan ID-nya
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        }

        $data['ticket_id'] = '#TIK-' . strtoupper(Str::random(6));
        $data['is_anonymous'] = $request->has('is_anonymous'); // Cek checkbox

        Complaint::create($data);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim! Kode Tiket Anda: ' . $data['ticket_id'] . '. Simpan kode ini untuk cek status.');
    }

    // Fitur Cek Status (Opsional)
    public function checkStatus(Request $request)
    {
        $ticket = $request->ticket_id;
        $complaint = Complaint::where('ticket_id', $ticket)->first();

        if (!$complaint) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan.');
        }

        return redirect()->back()->with('tracking_result', $complaint);
    }
}

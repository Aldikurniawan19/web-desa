<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\LetterRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterRequestController extends Controller
{
    public function index()
    {
        $letters = LetterRequest::where('user_id', Auth::id())->latest()->paginate(10, ['*'], 'surat_page');

        $user = Auth::user();

        $complaints = Complaint::where('user_id', $user->id)
            ->orWhere(function ($query) use ($user) {

                $query->where('name', $user->name)
                    ->orWhere('phone', $user->phone ?? '000');
            })
            ->latest()
            ->paginate(10, ['*'], 'aduan_page');
        return view('public.layanan.index', compact('letters', 'complaints'));
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

    public function download($id)
    {
        // 1. Cari surat
        $letter = LetterRequest::with('user')->findOrFail($id);

        // 2. Keamanan: Pastikan yang download adalah pemilik surat
        if ($letter->user_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke surat ini.');
        }

        // 3. Keamanan: Pastikan surat sudah selesai
        if ($letter->status != 'completed') {
            return redirect()->back()->with('error', 'Surat belum selesai diproses.');
        }

        // 4. Siapkan Data untuk View PDF
        $data = [
            'letter' => $letter,
            'user' => $letter->user,
            'date' => now()->translatedFormat('d F Y'), // Tanggal cetak
        ];

        // 5. Load View PDF
        $pdf = Pdf::loadView('pdf.surat_keterangan', $data);

        // Set ukuran kertas F4/A4 (Portrait)
        $pdf->setPaper('A4', 'portrait');

        // 6. Download file
        return $pdf->download('Surat-' . str_replace(' ', '-', $letter->type) . '.pdf');
    }
}

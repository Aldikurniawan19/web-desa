<?php

namespace App\Http\Controllers;

use App\Models\LetterRequest;
use Illuminate\Http\Request;

class AdminLetterController extends Controller
{
    public function index()
    {
        $letters = LetterRequest::with('user')->latest()->paginate(10);
        return view('admin.letters.index', compact('letters'));
    }

    public function show($id)
    {
        $letter = LetterRequest::with('user')->findOrFail($id);
        return view('admin.letters.show', compact('letter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,completed,rejected',
            'admin_note' => 'nullable|string'
        ]);

        $letter = LetterRequest::findOrFail($id);

        $letter->update([
            'status' => $request->status,
            'admin_note' => $request->admin_note
        ]);

        return redirect()->route('admin.letters.show', $id)
            ->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $letter = LetterRequest::findOrFail($id);
        $letter->delete();

        return redirect()->route('admin.letters.index')->with('success', 'Data pengajuan dihapus.');
    }
}

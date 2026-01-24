<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->paginate(10);
        return view('admin.potensi.index', compact('potensi'));
    }

    public function create()
    {
        return view('admin.potensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'nullable|image|max:2048',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potensi', 'public');
        }

        Potensi::create($data);

        return redirect()->route('admin.potensi.index')->with('success', 'Data potensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $potensi = Potensi::findOrFail($id);
        return view('admin.potensi.edit', compact('potensi'));
    }

    public function update(Request $request, $id)
    {
        $potensi = Potensi::findOrFail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($potensi->image) Storage::disk('public')->delete($potensi->image);
            $data['image'] = $request->file('image')->store('potensi', 'public');
        }

        $potensi->update($data);

        return redirect()->route('admin.potensi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $potensi = Potensi::findOrFail($id);
        if ($potensi->image) Storage::disk('public')->delete($potensi->image);
        $potensi->delete();

        return redirect()->route('admin.potensi.index')->with('success', 'Data dihapus.');
    }
}

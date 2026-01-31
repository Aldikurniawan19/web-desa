<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use Illuminate\Http\Request;

class AdminApbdesController extends Controller
{
    public function index()
    {
        $apbdes = Apbdes::orderBy('tahun', 'desc')->get();
        return view('admin.apbdes.index', compact('apbdes'));
    }

    public function create()
    {
        return view('admin.apbdes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun' => 'required|numeric|unique:apbdes,tahun',
            'pendapatan_dd' => 'required|numeric',
            'pendapatan_add' => 'required|numeric',
            'pendapatan_pades' => 'required|numeric',
            'pendapatan_lain' => 'required|numeric',
            'belanja_pemerintahan' => 'required|numeric',
            'belanja_pembangunan' => 'required|numeric',
            'belanja_kemasyarakatan' => 'required|numeric',
            'belanja_pemberdayaan' => 'required|numeric',
            'realisasi_pemerintahan' => 'nullable|numeric',
            'realisasi_pembangunan' => 'nullable|numeric',
            'realisasi_kemasyarakatan' => 'nullable|numeric',
            'realisasi_pemberdayaan' => 'nullable|numeric',
        ]);

        Apbdes::create($data);
        return redirect()->route('admin.apbdes.index')->with('success', 'Data APBDes berhasil disimpan.');
    }

    public function edit($id)
    {
        $apbdes = Apbdes::findOrFail($id);
        return view('admin.apbdes.edit', compact('apbdes'));
    }

    public function update(Request $request, $id)
    {
        $apbdes = Apbdes::findOrFail($id);

        $data = $request->validate([
            'tahun' => 'required|numeric|unique:apbdes,tahun,' . $id,
            'pendapatan_dd' => 'required|numeric',
            'pendapatan_add' => 'required|numeric',
            'pendapatan_pades' => 'required|numeric',
            'pendapatan_lain' => 'required|numeric',
            'belanja_pemerintahan' => 'required|numeric',
            'belanja_pembangunan' => 'required|numeric',
            'belanja_kemasyarakatan' => 'required|numeric',
            'belanja_pemberdayaan' => 'required|numeric',
            'realisasi_pemerintahan' => 'nullable|numeric',
            'realisasi_pembangunan' => 'nullable|numeric',
            'realisasi_kemasyarakatan' => 'nullable|numeric',
            'realisasi_pemberdayaan' => 'nullable|numeric',
        ]);

        $apbdes->update($data);
        return redirect()->route('admin.apbdes.index')->with('success', 'Data APBDes diperbarui.');
    }

    public function destroy($id)
    {
        Apbdes::destroy($id);
        return redirect()->back()->with('success', 'Data dihapus.');
    }
}

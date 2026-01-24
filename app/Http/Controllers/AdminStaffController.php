<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStaffController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan Level (1=Kades dulu), lalu Nama
        $staff = Staff::orderBy('level', 'asc')->orderBy('id', 'asc')->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    // 2. Form Tambah
    public function create()
    {
        return view('admin.staff.create');
    }

    // 3. Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'level' => 'required|in:1,2,3', // 1=Kades, 2=Sekdes, 3=Kasi/Kaur
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        // Upload Foto jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    // 4. Form Edit
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit', compact('staff'));
    }

    // 5. Update Data
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'level' => 'required|in:1,2,3',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Cek jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama agar hemat storage
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Data dihapus.');
    }
}

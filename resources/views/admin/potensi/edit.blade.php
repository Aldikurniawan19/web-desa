<x-layouts.admin>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold mb-6">Edit Potensi Desa</h2>
        <form action="{{ route('admin.potensi.update', $potensi->id) }}" method="PUT" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            <div>
                <label class="block font-bold text-sm mb-1">Nama Produk / Wisata</label>
                <input type="text" name="title" value="{{ $potensi->title }}"
                    class="w-full rounded-lg border-slate-300" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-sm mb-1">Kategori</label>
                    <select name="category" class="w-full rounded-lg border-slate-300">
                        <option value="umkm">UMKM (Produk)</option>
                        <option value="wisata">Wisata</option>
                        <option value="pertanian">Pertanian</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1">Harga (Opsional)</label>
                    <input type="number" name="price" class="w-full rounded-lg border-slate-300"
                        placeholder="Contoh: 15000">
                </div>
            </div>
            <div>
                <label class="block font-bold text-sm mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full rounded-lg border-slate-300"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-sm mb-1">Pemilik / Kontak (WA)</label>
                    <input type="text" name="contact" class="w-full rounded-lg border-slate-300"
                        placeholder="0812xxxx">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1">Lokasi / Alamat</label>
                    <input type="text" name="location" class="w-full rounded-lg border-slate-300">
                </div>
            </div>
            <div>
                <label class="block font-bold text-sm mb-1">Foto Utama</label>
                <input type="file" name="image"
                    class="block w-full text-sm text-slate-500 file:bg-emerald-50 file:text-emerald-700 file:px-4 file:py-2 file:rounded-full file:border-0">
            </div>
            <button class="w-full py-2 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700">Simpan
                Data</button>
        </form>
    </div>
</x-layouts.admin>

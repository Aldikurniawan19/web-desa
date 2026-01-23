<x-layouts.admin>
    <div class="mb-6">
        <a href="{{ route('articles.index') }}"
            class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <h2 class="text-2xl font-bold text-slate-800 mt-2">Edit Berita</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT') <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul Artikel</label>
                <input type="text" name="title" id="title"
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition"
                    value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
                    <select name="category" id="category"
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition">
                        <option value="berita" {{ $article->category == 'berita' ? 'selected' : '' }}>Berita Desa
                        </option>
                        <option value="pengumuman" {{ $article->category == 'pengumuman' ? 'selected' : '' }}>Pengumuman
                        </option>
                        <option value="agenda" {{ $article->category == 'agenda' ? 'selected' : '' }}>Agenda Kegiatan
                        </option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status Publikasi</label>
                    <select name="status" id="status"
                        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition">
                        <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Langsung
                            Terbit</option>
                        <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft
                        </option>
                    </select>
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-1">Gambar Utama</label>

                @if ($article->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Preview"
                            class="h-32 rounded-lg border border-slate-200 object-cover">
                        <p class="text-xs text-slate-400 mt-1">Gambar saat ini. Biarkan kosong jika tidak ingin
                            mengubah.</p>
                    </div>
                @endif

                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                @error('image')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-slate-700 mb-1">Isi Berita</label>
                <textarea name="content" id="content" rows="10"
                    class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition"
                    required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('articles.index') }}"
                    class="px-6 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-lg font-bold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-bold shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5">
                    Update Berita
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>

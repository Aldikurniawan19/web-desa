<x-layouts.admin>
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.letters.index') }}"
            class="p-2 bg-white rounded-lg border border-slate-200 text-slate-500 hover:text-emerald-600 hover:border-emerald-300 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Verifikasi Pengajuan</h2>
            <p class="text-slate-500 text-sm">Permohonan #{{ $letter->id }} oleh {{ $letter->user->name }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="font-bold text-slate-800 mb-4 border-b pb-2 border-slate-50">Data Pengajuan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <span class="block text-xs text-slate-400 uppercase tracking-wide">Jenis Surat</span>
                        <span class="font-bold text-slate-800 text-lg">{{ $letter->type }}</span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 uppercase tracking-wide">Tanggal Masuk</span>
                        <span
                            class="font-medium text-slate-800">{{ $letter->created_at->translatedFormat('d F Y, H:i') }}
                            WIB</span>
                    </div>
                    <div class="md:col-span-2">
                        <span class="block text-xs text-slate-400 uppercase tracking-wide mb-1">Keperluan</span>
                        <p class="bg-slate-50 p-3 rounded-lg text-slate-700 border border-slate-100">
                            {{ $letter->purpose }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="font-bold text-slate-800 mb-4 border-b pb-2 border-slate-50">Lampiran Berkas</h3>
                @if ($letter->attachment)
                    <div class="border rounded-xl overflow-hidden bg-slate-50">
                        <img src="{{ asset('storage/' . $letter->attachment) }}" alt="Lampiran"
                            class="w-full max-h-[500px] object-contain">
                        <div class="p-3 bg-white border-t text-center">
                            <a href="{{ asset('storage/' . $letter->attachment) }}" target="_blank"
                                class="text-emerald-600 font-bold hover:underline text-sm">
                                Lihat Ukuran Penuh / Download
                            </a>
                        </div>
                    </div>
                @else
                    <div
                        class="p-8 text-center text-slate-400 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                        <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                            </path>
                        </svg>
                        <p>Tidak ada lampiran file yang diupload.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-emerald-100 sticky top-6">
                <h3 class="font-bold text-slate-800 mb-4">Tindak Lanjut</h3>

                <form action="{{ route('admin.letters.update', $letter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Update Status</label>
                        <select name="status"
                            class="w-full rounded-xl border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition font-medium">
                            <option value="pending" {{ $letter->status == 'pending' ? 'selected' : '' }}>⏳ Menunggu
                            </option>
                            <option value="processed" {{ $letter->status == 'processed' ? 'selected' : '' }}>⚙️ Sedang
                                Diproses</option>
                            <option value="completed" {{ $letter->status == 'completed' ? 'selected' : '' }}>✅ Selesai
                                (Siap Ambil)</option>
                            <option value="rejected" {{ $letter->status == 'rejected' ? 'selected' : '' }}>❌ Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Catatan untuk Warga</label>
                        <textarea name="admin_note" rows="4"
                            class="w-full rounded-xl border-slate-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition text-sm"
                            placeholder="Contoh: Silakan ambil surat di kantor desa hari Senin jam 09.00">{{ $letter->admin_note }}</textarea>
                        <p class="text-xs text-slate-400 mt-1">Catatan ini akan terbaca oleh pemohon.</p>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5">
                        Simpan Perubahan
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wide mb-3">Kontak Pemohon</h4>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-slate-700">{{ $letter->user->name }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-slate-700">{{ $letter->user->email }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.admin>

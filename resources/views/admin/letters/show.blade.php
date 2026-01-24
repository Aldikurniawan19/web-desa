<x-layouts.admin>
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-1">
                <a href="{{ route('admin.letters.index') }}" class="hover:text-emerald-600 transition flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar
                </a>
                <span>/</span>
                <span>Detail Permohonan</span>
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Verifikasi Pengajuan Surat</h2>
        </div>

        <div class="flex items-center">
            @if ($letter->status == 'pending')
                <span
                    class="px-4 py-2 bg-amber-50 text-amber-600 rounded-lg text-sm font-bold border border-amber-100 flex items-center shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span> Menunggu Verifikasi
                </span>
            @elseif($letter->status == 'processed')
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-bold border border-blue-100 flex items-center shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500 mr-2"></span> Sedang Diproses
                </span>
            @elseif($letter->status == 'completed')
                <span
                    class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-lg text-sm font-bold border border-emerald-100 flex items-center shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Selesai
                </span>
            @else
                <span
                    class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-bold border border-red-100 flex items-center shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    Ditolak
                </span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-8">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-50 bg-slate-50/50 flex items-center justify-between">
                    <h3 class="font-bold text-slate-800">Data Permohonan</h3>
                    <span class="text-xs font-mono text-slate-400">ID: #{{ $letter->id }}</span>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Jenis
                            Surat</span>
                        <p class="text-lg font-bold text-slate-800">{{ $letter->type }}</p>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">Tanggal
                            Diajukan</span>
                        <div class="flex items-center text-slate-700 font-medium">
                            <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $letter->created_at->translatedFormat('d F Y, H:i') }} WIB
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <span class="block text-xs text-slate-400 uppercase tracking-wider font-bold mb-2">Keperluan /
                            Keterangan</span>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-slate-700 leading-relaxed">
                            {{ $letter->purpose }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-50 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">Berkas Lampiran</h3>
                </div>
                <div class="p-6">
                    @if ($letter->attachment)
                        <div class="border rounded-xl overflow-hidden bg-slate-50">
                            <div
                                class="relative group bg-gray-100 flex justify-center items-center overflow-hidden h-[400px]">
                                <img src="{{ asset('storage/' . $letter->attachment) }}" alt="Lampiran"
                                    class="object-contain h-full w-full transition duration-500 group-hover:scale-105">

                                <div
                                    class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                                    <a href="{{ asset('storage/' . $letter->attachment) }}" target="_blank"
                                        class="px-4 py-2 bg-white text-slate-800 rounded-lg font-bold text-sm hover:bg-emerald-50 hover:text-emerald-600 transition flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Lihat Penuh
                                    </a>
                                    <a href="{{ asset('storage/' . $letter->attachment) }}" download
                                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg font-bold text-sm hover:bg-emerald-700 transition flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="flex flex-col items-center justify-center py-10 text-slate-400 border-2 border-dashed border-slate-200 rounded-xl">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <p class="text-sm">Tidak ada lampiran berkas.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="lg:col-span-1 space-y-8">

            <div
                class="bg-white p-6 rounded-2xl shadow-lg shadow-emerald-500/10 border border-emerald-100 sticky top-24">
                <h3 class="font-bold text-slate-800 mb-6 flex items-center">
                    <span
                        class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </span>
                    Tindak Lanjut Admin
                </h3>

                <form action="{{ route('admin.letters.update', $letter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Update
                            Status</label>
                        <div class="relative">
                            <select name="status"
                                class="w-full pl-4 pr-10 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition appearance-none font-medium text-slate-700 bg-slate-50 cursor-pointer">
                                <option value="pending" {{ $letter->status == 'pending' ? 'selected' : '' }}>⏳ Menunggu
                                </option>
                                <option value="processed" {{ $letter->status == 'processed' ? 'selected' : '' }}>⚙️
                                    Sedang Diproses</option>
                                <option value="completed" {{ $letter->status == 'completed' ? 'selected' : '' }}>✅
                                    Selesai (Siap Ambil)</option>
                                <option value="rejected" {{ $letter->status == 'rejected' ? 'selected' : '' }}>❌
                                    Ditolak</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Catatan
                            untuk Warga</label>
                        <textarea name="admin_note" rows="4"
                            class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm bg-slate-50 placeholder:text-slate-400"
                            placeholder="Contoh: Surat sudah ditanda tangani, silakan ambil di kantor desa...">{{ $letter->admin_note }}</textarea>
                        <p class="text-[10px] text-slate-400 mt-2 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Pesan ini akan muncul di dashboard pemohon.
                        </p>
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5 active:translate-y-0">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="font-bold text-slate-800 mb-4 pb-4 border-b border-slate-50">Info Pemohon</h3>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-lg">
                        {{ substr($letter->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-bold text-slate-800">{{ $letter->user->name }}</p>
                        <p class="text-xs text-slate-500">Warga Terdaftar</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center text-sm text-slate-600">
                        <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $letter->user->email }}
                    </div>
                    <div class="flex items-center text-sm text-slate-600">
                        <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        {{ $letter->phone ?? '-' }}
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-50">
                    <a href="https://wa.me/{{ $letter->phone }}" target="_blank"
                        class="flex items-center justify-center w-full py-2 bg-green-50 text-green-600 rounded-lg text-sm font-bold hover:bg-green-100 transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        Hubungi via WA
                    </a>
                </div>
            </div>

        </div>

    </div>
</x-layouts.admin>

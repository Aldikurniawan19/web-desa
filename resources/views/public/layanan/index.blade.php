<x-layouts.public>
    <div class="bg-slate-50/50 min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Layanan Mandiri</h1>
                    <p class="text-slate-500 text-sm mt-1">Pantau status pengajuan surat administrasi Anda di sini.</p>
                </div>
                <a href="{{ route('layanan.create') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5 gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Surat Baru
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">{{ $letters->total() }}</div>
                        <div class="text-xs text-slate-500 font-medium uppercase tracking-wide">Total Pengajuan</div>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">
                            {{ $letters->where('status', 'pending')->count() }}</div>
                        <div class="text-xs text-slate-500 font-medium uppercase tracking-wide">Menunggu Verifikasi
                        </div>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">
                            {{ $letters->where('status', 'completed')->count() }}</div>
                        <div class="text-xs text-slate-500 font-medium uppercase tracking-wide">Selesai</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600">
                        <thead
                            class="bg-slate-50 border-b border-slate-100 uppercase tracking-wider text-xs font-semibold text-slate-500">
                            <tr>
                                <th class="px-6 py-4">Jenis Surat</th>
                                <th class="px-6 py-4">Tanggal Pengajuan</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Keterangan Admin</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($letters as $letter)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 flex-shrink-0">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="block font-bold text-slate-800">{{ $letter->type }}</span>
                                                <span
                                                    class="block text-xs text-slate-400 mt-0.5 truncate max-w-[200px]">{{ $letter->purpose }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="block font-medium text-slate-700">{{ $letter->created_at->translatedFormat('d F Y') }}</span>
                                        <span class="text-xs text-slate-400">{{ $letter->created_at->format('H:i') }}
                                            WIB</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($letter->status == 'pending')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100">
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                Menunggu
                                            </span>
                                        @elseif($letter->status == 'processed')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                Diproses
                                            </span>
                                        @elseif($letter->status == 'completed')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Selesai
                                            </span>
                                        @elseif($letter->status == 'rejected')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($letter->admin_note)
                                            <p
                                                class="text-sm text-slate-600 bg-slate-50 p-2 rounded-lg border border-slate-100 italic">
                                                "{{ $letter->admin_note }}"
                                            </p>
                                        @else
                                            <span class="text-slate-400 text-xs italic">- Tidak ada catatan -</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        @if ($letter->status == 'completed')
                                            <button
                                                class="text-emerald-600 hover:text-emerald-700 font-medium text-sm inline-flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12">
                                                    </path>
                                                </svg>
                                                Unduh
                                            </button>
                                        @else
                                            <span class="text-slate-300 text-sm">Detail</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="bg-slate-50 p-4 rounded-full mb-3">
                                                <svg class="w-10 h-10 text-slate-300" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h3 class="text-slate-800 font-bold text-lg">Belum Ada Pengajuan</h3>
                                            <p class="text-slate-500 max-w-sm mt-1 mb-6">Anda belum pernah mengajukan
                                                surat apapun. Silakan buat pengajuan baru.</p>
                                            <a href="{{ route('layanan.create') }}"
                                                class="text-emerald-600 font-bold hover:underline">
                                                Buat Pengajuan Sekarang &rarr;
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($letters->hasPages())
                    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                        {{ $letters->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-layouts.public>

<x-layouts.admin>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Permohonan Surat</h2>
            <p class="text-slate-500 text-sm mt-1">Daftar pengajuan surat dari warga desa.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm text-left text-slate-600">
            <thead class="text-xs text-slate-400 uppercase bg-slate-50/50 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 font-semibold">Pemohon</th>
                    <th class="px-6 py-4 font-semibold">Jenis Surat</th>
                    <th class="px-6 py-4 font-semibold">Tanggal</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($letters as $letter)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-800">{{ $letter->user->name }}</div>
                            <div class="text-xs text-slate-400">NIK: {{ $letter->user->nik ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="block text-slate-700 font-medium">{{ $letter->type }}</span>
                            <span
                                class="block text-xs text-slate-400 truncate max-w-[200px]">{{ $letter->purpose }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $letter->created_at->translatedFormat('d M Y') }}
                            <div class="text-xs text-slate-400">{{ $letter->created_at->format('H:i') }} WIB</div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($letter->status == 'pending')
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100 animate-pulse">
                                    Menunggu
                                </span>
                            @elseif($letter->status == 'processed')
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                                    Diproses
                                </span>
                            @elseif($letter->status == 'completed')
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    Selesai
                                </span>
                            @else
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">
                                    Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.letters.show', $letter->id) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition shadow-sm">
                                Verifikasi
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            Belum ada pengajuan surat masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-slate-100">
            {{ $letters->links() }}
        </div>
    </div>
</x-layouts.admin>

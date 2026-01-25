<x-layouts.admin>

    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Aspirasi & Pengaduan</h2>
            <p class="text-slate-500 text-sm">Kelola laporan masyarakat yang masuk.</p>
        </div>
    </div>

    <div class="mb-6 flex space-x-1 bg-slate-100 p-1 rounded-xl w-fit">
        @php $status = request('status', 'all'); @endphp
        <a href="{{ route('admin.complaints.index', ['status' => 'all']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $status == 'all' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Semua</a>
        <a href="{{ route('admin.complaints.index', ['status' => 'pending']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $status == 'pending' ? 'bg-white text-yellow-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Menunggu</a>
        <a href="{{ route('admin.complaints.index', ['status' => 'processed']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $status == 'processed' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Diproses</a>
        <a href="{{ route('admin.complaints.index', ['status' => 'completed']) }}"
            class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $status == 'completed' ? 'bg-white text-emerald-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Selesai</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead
                    class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold text-xs border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4">Tiket & Tanggal</th>
                        <th class="px-6 py-4">Pelapor</th>
                        <th class="px-6 py-4">Kategori & Judul</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($complaints as $item)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="block font-mono font-bold text-slate-700">{{ $item->ticket_id }}</span>
                                <span
                                    class="text-xs text-slate-400">{{ $item->created_at->format('d M Y, H:i') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->is_anonymous)
                                    <div class="flex items-center text-slate-500">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>
                                        <span class="italic font-medium">Anonim</span>
                                    </div>
                                @else
                                    <div class="font-bold text-slate-700">{{ $item->name }}</div>
                                    <div class="text-xs text-slate-400">{{ $item->phone }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-500 mb-1 border border-slate-200 uppercase tracking-wide">
                                    {{ $item->category }}
                                </span>
                                <div class="font-medium text-slate-800 line-clamp-1" title="{{ $item->subject }}">
                                    {{ Str::limit($item->subject, 40) }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 'pending')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">Menunggu</span>
                                @elseif($item->status == 'processed')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Diproses</span>
                                @elseif($item->status == 'completed')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">Selesai</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.complaints.show', $item->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-600 hover:text-emerald-600 hover:border-emerald-500 transition shadow-sm">
                                    Detail
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
                                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                                <p>Tidak ada data pengaduan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $complaints->appends(request()->query())->links() }}
        </div>
    </div>
</x-layouts.admin>

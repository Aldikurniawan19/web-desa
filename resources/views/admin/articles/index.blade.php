<x-layouts.admin>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Daftar Berita</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola semua artikel dan publikasi desa.</p>
        </div>
        <a href="{{ route('articles.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition-all shadow-lg shadow-emerald-200 hover:shadow-emerald-300 hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tulis Berita
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-400 uppercase bg-slate-50/50 border-b border-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-5 font-semibold tracking-wider">Artikel</th>
                        <th scope="col" class="px-6 py-5 font-semibold tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-5 font-semibold tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-5 font-semibold tracking-wider">Dibuat Pada</th>
                        <th scope="col" class="px-6 py-5 font-semibold tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($articles as $article)
                        <tr class="bg-white hover:bg-slate-50/80 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="relative w-16 h-12 flex-shrink-0 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                        @if ($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}" alt="Thumbnail"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="flex items-center justify-center w-full h-full text-slate-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 line-clamp-1 hover:text-emerald-600 transition cursor-pointer"
                                            title="{{ $article->title }}">
                                            {{ $article->title }}
                                        </div>
                                        <div class="text-xs text-slate-400 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            {{ $article->user->name ?? 'Admin' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @php
                                    $colors = [
                                        'berita' => 'bg-blue-50 text-blue-700 border-blue-100',
                                        'pengumuman' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        'agenda' => 'bg-purple-50 text-purple-700 border-purple-100',
                                    ];
                                    $colorClass =
                                        $colors[$article->category] ?? 'bg-slate-50 text-slate-700 border-slate-100';
                                @endphp
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold border {{ $colorClass }} uppercase tracking-wide">
                                    {{ $article->category }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($article->status == 'published')
                                        <div
                                            class="flex items-center px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-100">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                                            <span class="text-xs font-medium text-emerald-700">Terbit</span>
                                        </div>
                                    @else
                                        <div
                                            class="flex items-center px-2.5 py-1 rounded-full bg-slate-100 border border-slate-200">
                                            <span class="w-2 h-2 rounded-full bg-slate-400 mr-2"></span>
                                            <span class="text-xs font-medium text-slate-600">Draft</span>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">
                                <div class="flex flex-col">
                                    <span class="font-medium text-slate-700">
                                        {{ $article->created_at->translatedFormat('d F Y') }}
                                    </span>
                                    <span class="text-xs text-slate-400 mt-0.5">
                                        Pukul {{ $article->created_at->format('H:i') }} WIB
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('articles.edit', $article->id) }}"
                                        class="p-2 bg-white border border-slate-200 rounded-lg text-slate-600 hover:border-emerald-500 hover:text-emerald-600 hover:bg-emerald-50 transition-all duration-200"
                                        title="Edit Berita">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>

                                    <form id="delete-form-{{ $article->id }}"
                                        action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="confirmDelete(event, 'delete-form-{{ $article->id }}')"
                                            class="p-2 bg-white border border-slate-200 rounded-lg text-slate-600 hover:border-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200"
                                            title="Hapus Berita">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex flex-col items-center justify-center py-16 text-center">
                                    <div class="bg-slate-50 p-4 rounded-full mb-3">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h3 class="text-slate-800 font-semibold text-lg">Belum ada berita</h3>
                                    <p class="text-slate-500 max-w-sm mt-1 mb-4">Mulai tulis berita, pengumuman, atau
                                        agenda kegiatan desa Anda sekarang.</p>
                                    <a href="{{ route('articles.create') }}"
                                        class="text-emerald-600 font-medium hover:underline">
                                        + Buat Berita Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($articles->hasPages())
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/30">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</x-layouts.admin>

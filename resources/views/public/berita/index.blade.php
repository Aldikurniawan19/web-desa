<x-layouts.public>

    <div class="relative bg-white pt-16 pb-12 border-b border-slate-100 overflow-hidden">
        <div
            class="absolute inset-0 opacity-30 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-3 border border-emerald-100">
                Arsip Digital
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                Kabar & Informasi Desa
            </h1>
        </div>
    </div>

    <div class="bg-slate-50/50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <div class="lg:col-span-8 space-y-8">

                    @if (request('search') || request('category'))
                        <div
                            class="p-4 bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="text-slate-600">
                                @if (request('search'))
                                    Pencarian: <span class="font-bold text-slate-900">"{{ request('search') }}"</span>
                                @endif
                                @if (request('search') && request('category'))
                                    &bull;
                                @endif
                                @if (request('category'))
                                    Kategori: <span
                                        class="font-bold text-slate-900 capitalize">{{ request('category') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('berita.index') }}"
                                class="text-sm font-bold text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg transition">
                                Reset Filter
                            </a>
                        </div>
                    @endif

                    @forelse($articles as $article)
                        <article
                            class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg hover:border-emerald-100 transition-all duration-300 flex flex-col md:flex-row">
                            <a href="{{ route('berita.show', $article->slug) }}"
                                class="md:w-1/3 relative h-56 md:h-auto shrink-0 overflow-hidden block bg-slate-100">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center text-slate-400">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </a>

                            <div class="p-6 flex flex-col flex-1 relative">
                                <div class="flex items-center justify-between mb-2">
                                    <a href="{{ route('berita.index', ['category' => $article->category]) }}"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase tracking-wide hover:bg-emerald-100 transition">
                                        {{ $article->category }}
                                    </a>
                                    <span class="text-xs text-slate-400 flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $article->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3
                                    class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-emerald-600 transition">
                                    <a href="{{ route('berita.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-1">
                                    {{ $article->excerpt }}
                                </p>

                                <div class="mt-auto border-t border-slate-50 pt-4 flex items-center justify-between">
                                    <span class="text-xs font-medium text-slate-500">Oleh:
                                        {{ $article->user->name ?? 'Admin' }}</span>
                                    <a href="{{ route('berita.show', $article->slug) }}"
                                        class="text-sm font-bold text-emerald-600 hover:text-emerald-700 hover:underline flex items-center">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-slate-300">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-4">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800">Tidak ada berita</h3>
                            <p class="text-slate-500 text-sm mt-1">Belum ada artikel yang sesuai dengan kriteria Anda.
                            </p>
                        </div>
                    @endforelse

                    <div class="pt-4">
                        {{ $articles->appends(request()->query())->links() }}
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-8">

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 sticky top-24">
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Pencarian
                        </h3>
                        <form action="{{ route('berita.index') }}" method="GET">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif

                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Ketik kata kunci..."
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm">
                                <button type="submit"
                                    class="absolute inset-y-0 right-0 px-3 text-slate-400 hover:text-emerald-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Kategori Berita
                        </h3>
                        <div class="space-y-2">

                            <a href="{{ route('berita.index') }}"
                                class="flex items-center justify-between p-3 rounded-xl transition-all duration-200 {{ !request('category') ? 'bg-emerald-50 text-emerald-700 font-bold border border-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600 border border-transparent' }}">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 {{ !request('category') ? 'text-emerald-600' : 'text-slate-400' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    Semua Kategori
                                </span>
                                @if (!request('category'))
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @endif
                            </a>

                            <a href="{{ route('berita.index', ['category' => 'berita']) }}"
                                class="flex items-center justify-between p-3 rounded-xl transition-all duration-200 {{ request('category') == 'berita' ? 'bg-emerald-50 text-emerald-700 font-bold border border-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600 border border-transparent' }}">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 {{ request('category') == 'berita' ? 'text-emerald-600' : 'text-slate-400' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                        </path>
                                    </svg>
                                    Berita Desa
                                </span>
                                @if (request('category') == 'berita')
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @endif
                            </a>

                            <a href="{{ route('berita.index', ['category' => 'pengumuman']) }}"
                                class="flex items-center justify-between p-3 rounded-xl transition-all duration-200 {{ request('category') == 'pengumuman' ? 'bg-emerald-50 text-emerald-700 font-bold border border-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600 border border-transparent' }}">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 {{ request('category') == 'pengumuman' ? 'text-emerald-600' : 'text-slate-400' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                        </path>
                                    </svg>
                                    Pengumuman
                                </span>
                                @if (request('category') == 'pengumuman')
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @endif
                            </a>

                            <a href="{{ route('berita.index', ['category' => 'agenda']) }}"
                                class="flex items-center justify-between p-3 rounded-xl transition-all duration-200 {{ request('category') == 'agenda' ? 'bg-emerald-50 text-emerald-700 font-bold border border-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600 border border-transparent' }}">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 {{ request('category') == 'agenda' ? 'text-emerald-600' : 'text-slate-400' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Agenda Kegiatan
                                </span>
                                @if (request('category') == 'agenda')
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-emerald-600 to-teal-700 p-6 rounded-2xl shadow-lg text-white">
                        <h3 class="font-bold text-lg mb-2">Punya Informasi?</h3>
                        <p class="text-emerald-100 text-sm mb-4">Warga dapat berkontribusi memberikan informasi
                            kejadian di sekitar desa.</p>
                        <a href="#"
                            class="inline-block w-full py-2 bg-white text-emerald-700 font-bold text-center rounded-lg hover:bg-emerald-50 transition text-sm">
                            Hubungi Redaksi
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layouts.public>

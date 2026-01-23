<x-layouts.public>

    <div class="bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="text-sm text-slate-500 mb-2">
                <a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a> /
                <span class="text-slate-400">Berita</span> /
                <span class="text-emerald-600 font-medium">{{ Str::limit($article->title, 30) }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight max-w-4xl">
                {{ $article->title }}
            </h1>
            <div class="flex items-center mt-4 text-sm text-slate-500 space-x-6">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ $article->created_at->translatedFormat('l, d F Y') }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Penulis: {{ $article->user->name ?? 'Admin Desa' }}
                </span>
                <span
                    class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-xs uppercase tracking-wide">
                    {{ $article->category }}
                </span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                @if ($article->image)
                    <div class="rounded-2xl overflow-hidden shadow-lg mb-8">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                            class="w-full h-auto object-cover">
                    </div>
                @endif

                <div class="prose prose-lg prose-slate max-w-none text-slate-700 leading-relaxed">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <div class="mt-10 pt-6 border-t border-slate-200">
                    <p class="text-sm font-bold text-slate-800 mb-3">Bagikan berita ini:</p>
                    <div class="flex space-x-2">
                        <button
                            class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">Facebook</button>
                        <button
                            class="px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded hover:bg-sky-600 transition">Twitter</button>
                        <button
                            class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition">WhatsApp</button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-lg text-slate-800 mb-4 border-l-4 border-emerald-500 pl-3">Berita Lainnya
                    </h3>
                    <div class="space-y-4">
                        @forelse($other_articles as $item)
                            <a href="{{ route('berita.show', $item->slug) }}" class="flex gap-4 group">
                                <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-slate-100">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition">
                                    @else
                                        <div
                                            class="w-full h-full bg-emerald-100 flex items-center justify-center text-emerald-500">
                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-700 group-hover:text-emerald-600 transition line-clamp-2 leading-snug">
                                        {{ $item->title }}
                                    </h4>
                                    <span
                                        class="text-xs text-slate-400 mt-1 block">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-slate-400">Tidak ada berita lain.</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-lg text-slate-800 mb-4 border-l-4 border-emerald-500 pl-3">Kategori</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li><a href="#" class="flex justify-between hover:text-emerald-600"><span>Berita
                                    Desa</span> <span
                                    class="bg-slate-100 px-2 rounded-full text-xs py-0.5">12</span></a></li>
                        <li><a href="#"
                                class="flex justify-between hover:text-emerald-600"><span>Pengumuman</span> <span
                                    class="bg-slate-100 px-2 rounded-full text-xs py-0.5">5</span></a></li>
                        <li><a href="#" class="flex justify-between hover:text-emerald-600"><span>Agenda</span>
                                <span class="bg-slate-100 px-2 rounded-full text-xs py-0.5">3</span></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</x-layouts.public>

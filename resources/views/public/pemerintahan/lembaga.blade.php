<x-layouts.public>

    <div class="bg-white pt-20 pb-10 border-b border-slate-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-emerald-600 font-bold tracking-widest text-xs uppercase mb-2 block">Pemerintahan
                Desa</span>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Lembaga Desa</h1>
            <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full"></div>
            <p class="text-slate-500 mt-4 max-w-xl mx-auto">
                Mitra kerja pemerintah desa dalam memberdayakan masyarakat dan menyukseskan pembangunan.
            </p>
        </div>
    </div>

    <div class="bg-slate-50/50 py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($lembaga as $item)
                    <div
                        class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">

                        <div class="flex items-start justify-between mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl flex items-center justify-center 
                                {{ $item['color'] == 'blue' ? 'bg-blue-50 text-blue-600' : '' }}
                                {{ $item['color'] == 'emerald' ? 'bg-emerald-50 text-emerald-600' : '' }}
                                {{ $item['color'] == 'rose' ? 'bg-rose-50 text-rose-600' : '' }}
                                {{ $item['color'] == 'orange' ? 'bg-orange-50 text-orange-600' : '' }}
                                {{ $item['color'] == 'slate' ? 'bg-slate-100 text-slate-600' : '' }}
                                {{ $item['color'] == 'indigo' ? 'bg-indigo-50 text-indigo-600' : '' }}
                                group-hover:scale-110 transition-transform duration-300">

                                @if ($item['icon'] == 'users')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                @elseif($item['icon'] == 'hand-raised')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11">
                                        </path>
                                    </svg>
                                @elseif($item['icon'] == 'heart')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                @elseif($item['icon'] == 'fire')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z">
                                        </path>
                                    </svg>
                                @elseif($item['icon'] == 'shield-check')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                @elseif($item['icon'] == 'building-storefront')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                        </path>
                                    </svg>
                                @endif
                            </div>

                            <span
                                class="text-xs font-bold px-2 py-1 rounded bg-slate-50 text-slate-500 uppercase tracking-wide">
                                {{ $item['name'] }}
                            </span>
                        </div>

                        <div>
                            <h3
                                class="text-xl font-bold text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors">
                                {{ $item['fullname'] }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6">
                                {{ $item['desc'] }}
                            </p>
                        </div>

                        <div class="border-t border-slate-50 pt-4 flex items-center">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mr-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block font-bold">Ketua
                                    Lembaga</span>
                                <span class="text-sm font-semibold text-slate-700">{{ $item['ketua'] }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

            <div class="mt-16 text-center">
                <p class="text-slate-500 mb-4">Ingin mengetahui struktur organisasi lengkap pemerintahan desa?</p>
                <a href="{{ route('pemerintahan.struktur') }}"
                    class="inline-flex items-center px-6 py-3 bg-white border border-slate-200 rounded-full text-slate-700 font-bold text-sm hover:border-emerald-500 hover:text-emerald-600 transition shadow-sm hover:shadow-md">
                    Lihat Struktur Pemerintahan
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</x-layouts.public>

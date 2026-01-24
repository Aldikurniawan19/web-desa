<x-layouts.public>

    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="text-emerald-400 font-bold tracking-wider uppercase text-sm">Pemerintahan Desa</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-2 mb-4">Struktur Organisasi</h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-lg">Mengenal lebih dekat jajaran perangkat desa yang siap
                melayani masyarakat.</p>
        </div>
    </div>

    <div class="bg-slate-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if ($kades)
                <div class="flex justify-center mb-16">
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
                        </div>
                        <div
                            class="relative bg-white rounded-2xl p-6 shadow-xl border border-slate-100 max-w-sm text-center transform transition duration-500 hover:scale-105">
                            <div
                                class="w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-emerald-100 mb-6 shadow-sm bg-slate-100">
                                @if ($kades->image)
                                    <img src="{{ asset('storage/' . $kades->image) }}" alt="{{ $kades->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($kades->name) }}&background=10b981&color=fff&size=512"
                                        alt="{{ $kades->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800">{{ $kades->name }}</h3>
                            <p class="text-emerald-600 font-bold uppercase tracking-wide text-sm mt-1">
                                {{ $kades->position }}</p>
                            @if ($kades->nip)
                                <p class="text-slate-400 text-xs mt-2">NIP. {{ $kades->nip }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="hidden md:block w-px h-16 bg-slate-300 mx-auto -mt-16 mb-16 relative z-0"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-16 relative z-10">
                @foreach ($pimpinan as $p)
                    <div
                        class="bg-white rounded-xl p-6 shadow-md border-t-4 border-emerald-500 hover:shadow-xl transition transform hover:-translate-y-1 text-center">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-4 bg-slate-100">
                            @if ($p->image)
                                <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($p->name) }}&background=0f172a&color=fff&size=256"
                                    class="w-full h-full object-cover">
                            @endif
                        </div>
                        <h4 class="text-xl font-bold text-slate-800">{{ $p->name }}</h4>
                        <p class="text-slate-500 text-sm font-medium uppercase">{{ $p->position }}</p>
                        @if ($p->nip)
                            <span
                                class="inline-block mt-2 px-3 py-1 bg-slate-100 text-slate-500 text-xs rounded-full font-semibold">NIP.
                                {{ $p->nip }}</span>
                        @endif
                    </div>
                @endforeach
            </div>

            @if ($staff->count() > 0)
                <div class="text-center mb-10">
                    <span
                        class="bg-white px-4 py-1 rounded-full border border-slate-200 text-slate-500 text-sm font-bold uppercase tracking-wider shadow-sm">Pelaksana
                        Teknis & Kewilayahan</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($staff as $s)
                        <div
                            class="bg-white rounded-lg p-5 shadow-sm hover:shadow-md transition border border-slate-100 text-center group">
                            <div
                                class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-3 bg-slate-100 group-hover:ring-2 ring-emerald-400 transition">
                                @if ($s->image)
                                    <img src="{{ asset('storage/' . $s->image) }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($s->name) }}&background=e2e8f0&color=475569&size=256"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <h5 class="font-bold text-slate-800">{{ $s->name }}</h5>
                            <p class="text-xs text-slate-500 uppercase font-bold mt-1">{{ $s->position }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-layouts.public>

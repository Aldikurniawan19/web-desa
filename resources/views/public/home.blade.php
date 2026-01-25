<x-layouts.public>

    <div x-data="{
        activeSlide: 0,
        slides: [
            { img: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', title: 'Selamat Datang di Desa Maju', subtitle: 'Menuju Desa Mandiri, Sejahtera, dan Berbudaya' },
            { img: 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', title: 'Pelayanan Publik Digital', subtitle: 'Urus surat menyurat kini lebih mudah dari rumah' },
            { img: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', title: 'Potensi Alam Melimpah', subtitle: 'Mendukung ekonomi kreatif dan pariwisata lokal' }
        ],
        timer: null,
        startAutoSlide() {
            this.timer = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            }, 5000);
        }
    }" x-init="startAutoSlide()" class="relative w-full h-[500px] md:h-[600px] overflow-hidden">

        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="absolute inset-0 w-full h-full bg-cover bg-center"
                :style="`background-image: url('${slide.img}')`">

                <div class="absolute inset-0 bg-slate-900/50"></div>

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg" x-text="slide.title"></h1>
                    <p class="text-lg md:text-2xl text-slate-200 mb-8 max-w-2xl drop-shadow-md" x-text="slide.subtitle">
                    </p>
                    <div>
                        <a href="#layanan"
                            class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full font-semibold transition shadow-lg shadow-emerald-500/30">Jelajahi
                            Desa</a>
                    </div>
                </div>
            </div>
        </template>

        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="activeSlide = index"
                    :class="{ 'bg-emerald-500 w-8': activeSlide === index, 'bg-white/50 w-3': activeSlide !== index }"
                    class="h-3 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>

    <section id="layanan"
        class="py-16 bg-white relative -mt-16 z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 rounded-t-3xl shadow-xl border-t border-slate-100">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-800">Layanan Mandiri</h2>
            <p class="text-slate-600 mt-2">Akses cepat layanan administrasi desa</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="{{ route('layanan.index') }}"
                class="group p-6 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                <div
                    class="w-14 h-14 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-800 group-hover:text-blue-600 transition">Surat Online</h3>
                <p class="text-xs text-slate-500 mt-2">Buat surat keterangan dari rumah</p>
            </a>

            <a href="{{ route('layanan.pengaduan') }}"
                class="group p-6 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                <div
                    class="w-14 h-14 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-800 group-hover:text-red-600 transition">Pengaduan</h3>
                <p class="text-xs text-slate-500 mt-2">Laporkan masalah di lingkungan</p>
            </a>

            <a href="{{ route('berita.index') }}"
                class="group p-6 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                <div
                    class="w-14 h-14 mx-auto bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-800 group-hover:text-amber-600 transition">Info Desa</h3>
                <p class="text-xs text-slate-500 mt-2">Berita dan pengumuman terbaru</p>
            </a>

            <a href="{{ route('potensi.index') }}"
                class="group p-6 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                <div
                    class="w-14 h-14 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 transition">UMKM Desa</h3>
                <p class="text-xs text-slate-500 mt-2">Produk unggulan warga desa</p>
            </a>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-emerald-200 rounded-3xl rotate-6 transform translate-x-2 translate-y-2">
                        </div>
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Kepala Desa" class="relative rounded-3xl shadow-xl w-full object-cover h-[400px]">
                        <div
                            class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-lg border border-slate-200">
                            <h4 class="font-bold text-slate-900 text-lg">Bapak H. Sutrisno</h4>
                            <p class="text-emerald-600 text-sm font-medium">Kepala Desa Maju</p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-2/3">
                    <span
                        class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold mb-4">SAMBUTAN
                        KEPALA DESA</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 leading-tight">Membangun Desa Cerdas,
                        Melayani dengan Hati</h2>
                    <p class="text-slate-600 leading-relaxed mb-6 text-lg">
                        "Selamat datang di website resmi Desa Maju. Website ini kami hadirkan sebagai wujud transparansi
                        dan upaya peningkatan pelayanan kepada masyarakat. Di era digital ini, kami berkomitmen untuk
                        menghadirkan pemerintahan desa yang akuntabel, inovatif, dan responsif."
                    </p>
                    <p class="text-slate-600 leading-relaxed mb-8">
                        Kami mengajak seluruh elemen masyarakat untuk bersinergi membangun desa kita tercinta. Mari
                        manfaatkan teknologi ini untuk kemudahan kita bersama.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-emerald-600 font-bold hover:text-emerald-700 hover:underline">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <section class="py-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white">Statistik Desa</h2>
                <p class="text-slate-400 mt-2">Data kependudukan terbaru tahun {{ date('Y') }}</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div
                    class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:border-emerald-500 transition group">
                    <div class="text-4xl font-bold text-white mb-2 group-hover:text-emerald-400 transition">3,450</div>
                    <div class="text-sm text-slate-400 uppercase tracking-wider">Penduduk</div>
                </div>
                <div
                    class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:border-emerald-500 transition group">
                    <div class="text-4xl font-bold text-white mb-2 group-hover:text-emerald-400 transition">1,200</div>
                    <div class="text-sm text-slate-400 uppercase tracking-wider">Kepala Keluarga</div>
                </div>
                <div
                    class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:border-emerald-500 transition group">
                    <div class="text-4xl font-bold text-white mb-2 group-hover:text-emerald-400 transition">45</div>
                    <div class="text-sm text-slate-400 uppercase tracking-wider">RT</div>
                </div>
                <div
                    class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:border-emerald-500 transition group">
                    <div class="text-4xl font-bold text-white mb-2 group-hover:text-emerald-400 transition">12</div>
                    <div class="text-sm text-slate-400 uppercase tracking-wider">RW</div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-emerald-600 font-bold tracking-wider uppercase text-sm">Kabar Desa</span>
                    <h2 class="text-3xl font-bold text-slate-900 mt-2">Berita & Kegiatan Terbaru</h2>
                </div>
                <a href="{{ route('berita.index') }}"
                    class="hidden md:inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition">
                    Lihat Semua Berita
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latest_articles as $article)
                    <article
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-slate-100 overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute inset-0 bg-slate-200 animate-pulse"></div>
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div
                                    class="absolute inset-0 bg-emerald-50 flex items-center justify-center text-emerald-200">
                                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z">
                                        </path>
                                        <path d="m10 14-1-1-3 4h12l-5-7z"></path>
                                    </svg>
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span
                                    class="px-3 py-1 bg-white/90 backdrop-blur text-xs font-bold text-emerald-700 rounded-full shadow-sm uppercase tracking-wide">
                                    {{ $article->category }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center text-xs text-slate-500 mb-3 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $article->created_at->translatedFormat('d F Y') }}
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    {{ $article->user->name ?? 'Admin' }}
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-emerald-600 transition">
                                <a href="{{ route('berita.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <p class="text-slate-600 text-sm line-clamp-3 mb-4 flex-1">
                                {{ $article->excerpt }}
                            </p>

                            <a href="{{ route('berita.show', $article->slug) }}"
                                class="inline-flex items-center text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition mt-auto">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-3 text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                        <svg class="w-12 h-12 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <h3 class="text-lg font-medium text-slate-900">Belum ada berita terbaru</h3>
                        <p class="text-slate-500">Silakan update berita melalui halaman admin.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('berita.index') }}"
                    class="inline-block px-6 py-3 border border-emerald-600 text-emerald-600 font-semibold rounded-full hover:bg-emerald-50 transition">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>

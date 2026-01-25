<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    class="top-0 z-50 transition-all duration-300 ease-in-out 
     {{ request()->routeIs('home') ? 'fixed w-full' : 'sticky bg-white border-b border-slate-100 shadow-sm' }}"
    :class="{
        'bg-white/90 backdrop-blur-md shadow-md ': scrolled,
        'bg-transparent': !scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
    }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">

                    <div class="relative w-12 h-15 rounded-lg overflow-hidden  group-hover:scale-105 transition-transform duration-300"
                        :class="{
                            'shadow-emerald-200': scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }},
                            'shadow-black/20': !scrolled &&
                                {{ request()->routeIs('home') ? 'true' : 'false' }}
                        }">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo Desa" class="w-full h-full object-cover">
                    </div>

                    <div class="flex flex-col transition-colors duration-300">
                        <span class="text-lg font-bold leading-none"
                            :class="{
                                'text-slate-800': scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }},
                                'text-white': !scrolled &&
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}
                            }">
                            Desa Maju
                        </span>
                        <span class="text-xs font-medium"
                            :class="{
                                'text-slate-500': scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }},
                                'text-emerald-50': !scrolled &&
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}
                            }">
                            Kabupaten Sejahtera
                        </span>
                    </div>
                </a>
            </div>

            <div class="hidden md:flex space-x-1 items-center">

                <a href="{{ route('home') }}"
                    class="px-4 py-2 text-sm rounded-full font-medium transition-all duration-300"
                    :class="{
                        /* State: White Navbar (Scrolled or Not Home) */
                        'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                        'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                    
                        /* State: Transparent Navbar (Home Top) */
                        'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                        'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('home') ? 'true' : 'false' }}
                    }">
                    Beranda
                </a>

                <div class="relative group h-full flex items-center">
                    <button
                        class="px-4 py-2 text-sm rounded-full font-medium inline-flex items-center transition-all duration-300"
                        :class="{
                            'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('profil.*') ? 'true' : 'false' }},
                            'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('profil.*') ? 'true' : 'false' }},
                        
                            'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                    scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('profil.*') ? 'true' : 'false' }},
                            'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('profil.*') ? 'true' : 'false' }}
                        }">
                        Profil Desa
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 top-[65px] w-56 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 p-2 z-50">
                        <a href="{{ route('profil.sejarah') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('profil.sejarah') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Sejarah
                            Desa</a>
                        <a href="{{ route('profil.visi-misi') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('profil.visi-misi') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Visi
                            & Misi</a>
                    </div>
                </div>

                <div class="relative group h-full flex items-center">
                    <button
                        class="px-4 py-2 text-sm rounded-full font-medium inline-flex items-center transition-all duration-300"
                        :class="{
                            'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('pemerintahan.*') ? 'true' : 'false' }},
                            'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('pemerintahan.*') ? 'true' : 'false' }},
                        
                            'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                    scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('pemerintahan.*') ? 'true' : 'false' }},
                            'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('pemerintahan.*') ? 'true' : 'false' }}
                        }">
                        Pemerintahan
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 top-[65px] w-56 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 p-2 z-50">
                        <a href="{{ route('pemerintahan.struktur') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('pemerintahan.struktur') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Struktur
                            Organisasi</a>
                        <a href="{{ route('pemerintahan.lembaga') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('pemerintahan.lembaga') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Lembaga
                            Desa</a>
                    </div>
                </div>
                <div class="relative group h-full flex items-center">
                    <button
                        class="px-4 py-2 text-sm rounded-full font-medium inline-flex items-center transition-all duration-300"
                        :class="{
                            'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('transparansi.*') ? 'true' : 'false' }},
                            'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('transparansi.*') ? 'true' : 'false' }},
                        
                            'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                    scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                                {{ request()->routeIs('transparansi.*') ? 'true' : 'false' }},
                            'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                    {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                                {{ request()->routeIs('transparansi.*') ? 'true' : 'false' }}
                        }">
                        Transparansi
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div
                        class="absolute left-0 top-[65px] w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 p-2 z-50">
                        <a href="{{ route('transparansi.apbdes') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('transparansi.apbdes') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">APBDes
                            (Infografis)</a>
                        <a href="{{ route('transparansi.realisasi') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('transparansi.realisasi') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Realisasi
                            Anggaran</a>
                        <div class="border-t border-slate-50 my-1"></div>
                        <a href="{{ route('transparansi.laporan') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('transparansi.laporan') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Laporan
                            Keuangan (PDF)</a>
                        <a href="{{ route('transparansi.program') }}"
                            class="block px-4 py-2.5 text-sm rounded-xl transition-colors {{ request()->routeIs('transparansi.program') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">Program
                            Kerja Desa</a>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}"
                    class="px-4 py-2 text-sm rounded-full font-medium transition-all duration-300"
                    :class="{
                        'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('berita.*') ? 'true' : 'false' }},
                        'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('berita.*') ? 'true' : 'false' }},
                    
                        'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('berita.*') ? 'true' : 'false' }},
                        'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('berita.*') ? 'true' : 'false' }}
                    }">
                    Berita
                </a>

                <a href="{{ route('potensi.index') }}"
                    class="px-4 py-2 text-sm rounded-full font-medium transition-all duration-300"
                    :class="{
                        'bg-emerald-50 text-emerald-700 font-bold': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('potensi.*') ? 'true' : 'false' }},
                        'text-slate-600 hover:text-emerald-600 hover:bg-slate-50': (scrolled || !
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('potensi.*') ? 'true' : 'false' }},
                    
                        'bg-white/20 text-white font-bold backdrop-blur-sm shadow-sm ring-1 ring-white/30': (!
                                scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}) &&
                            {{ request()->routeIs('potensi.*') ? 'true' : 'false' }},
                        'text-white/90 hover:text-white hover:bg-white/10': (!scrolled &&
                                {{ request()->routeIs('home') ? 'true' : 'false' }}) && !
                            {{ request()->routeIs('potensi.*') ? 'true' : 'false' }}
                    }">
                    Potensi
                </a>

                <div class="pl-4 ml-2 flex items-center gap-3 transition-colors duration-300"
                    :class="{
                        'border-l border-slate-200': scrolled || !
                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                        'border-l border-white/20': !scrolled &&
                            {{ request()->routeIs('home') ? 'true' : 'false' }}
                    }">
                    @auth
                        @if (Auth::user()->role !== 'warga')
                            <a href="{{ url('/dashboard') }}"
                                class="px-5 py-2.5 bg-slate-800 text-white text-sm font-semibold rounded-full hover:bg-slate-700 transition shadow-lg shadow-slate-300/50">
                                Dashboard
                            </a>
                        @else
                            <div class="hidden lg:flex flex-col items-end mr-2">
                                <span class="text-sm font-bold leading-none"
                                    :class="{
                                        'text-slate-700': scrolled || !
                                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                                        'text-white': !
                                            scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
                                    }">{{ Auth::user()->name }}</span>
                                <span class="text-[10px] uppercase"
                                    :class="{
                                        'text-slate-500': scrolled || !
                                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                                        'text-emerald-100': !
                                            scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
                                    }">Warga</span>
                            </div>

                            <a href="{{ route('layanan.index') }}"
                                class="px-5 py-2.5 border text-sm font-semibold rounded-full transition shadow-sm
                               {{ request()->routeIs('layanan.*') ? 'bg-emerald-50 border-emerald-500 text-emerald-600' : '' }}"
                                :class="{
                                    'bg-white border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600': scrolled ||
                                        !{{ request()->routeIs('home') ? 'true' : 'false' }},
                                    'bg-white/10 border-white/40 text-white hover:bg-white hover:text-emerald-600 hover:border-transparent backdrop-blur-sm':
                                        !scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
                                }">
                                Riwayat
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="p-2 transition"
                                    :class="{
                                        'text-slate-400 hover:text-red-500': scrolled || !
                                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                                        'text-white/70 hover:text-red-300':
                                            !scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
                                    }"
                                    title="Keluar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('layanan.create') }}"
                            class="px-6 py-2.5 bg-emerald-600 text-white text-sm font-bold rounded-full hover:bg-emerald-500 transition shadow-lg shadow-emerald-600/30 hover:shadow-emerald-600/50 transform hover:-translate-y-0.5">
                            Layanan Surat
                        </a>
                    @endauth
                </div>
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md transition duration-150 ease-in-out focus:outline-none"
                    :class="{
                        'text-slate-400 hover:text-slate-500 hover:bg-slate-100': scrolled || !
                            {{ request()->routeIs('home') ? 'true' : 'false' }},
                        'text-white hover:bg-white/20': !
                            scrolled && {{ request()->routeIs('home') ? 'true' : 'false' }}
                    }">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-white border-t border-slate-100 shadow-xl max-h-[80vh] overflow-y-auto">
        <div class="pt-2 pb-6 space-y-1 px-4">
            <a href="{{ route('home') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">Beranda</a>

            <div class="border-t border-slate-50 my-2"></div>
            <span class="block px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-wider">Profil</span>
            <a href="{{ route('profil.sejarah') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('profil.sejarah') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Sejarah
                Desa</a>
            <a href="{{ route('profil.visi-misi') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('profil.visi-misi') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Visi
                & Misi</a>

            <div class="border-t border-slate-50 my-2"></div>
            <span class="block px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-wider">Pemerintahan</span>
            <a href="{{ route('pemerintahan.struktur') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('pemerintahan.struktur') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Struktur
                Organisasi</a>
            <a href="{{ route('pemerintahan.lembaga') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('pemerintahan.lembaga') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Lembaga
                Desa</a>

            <div class="border-t border-slate-50 my-2"></div>
            <a href="{{ route('berita.index') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('berita.*') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Berita</a>
            <a href="{{ route('potensi.index') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('potensi.*') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">Potensi</a>

            <div class="border-t border-slate-50 my-4"></div>

            @auth
                @if (Auth::user()->role !== 'warga')
                    <a href="{{ url('/dashboard') }}"
                        class="block w-full text-center px-4 py-3 rounded-xl text-base font-bold text-white bg-slate-800 shadow-lg">Dashboard
                        Admin</a>
                @else
                    <a href="{{ route('layanan.index') }}"
                        class="block w-full text-center px-4 py-3 rounded-xl text-base font-bold text-emerald-700 bg-emerald-50 border border-emerald-200">Riwayat
                        Pengajuan</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf
                        <button type="submit"
                            class="block w-full text-center px-4 py-3 rounded-xl text-base font-bold text-red-500 bg-red-50 hover:bg-red-100">Keluar</button>
                    </form>
                @endif
            @else
                <a href="{{ route('layanan.create') }}"
                    class="block w-full text-center px-4 py-3 rounded-xl text-base font-bold text-white bg-emerald-600 shadow-lg shadow-emerald-200">Layanan
                    Surat</a>
                <a href="{{ route('login') }}"
                    class="block w-full text-center mt-3 px-4 py-3 rounded-xl text-base font-bold text-slate-500 bg-slate-100">Login
                    Admin</a>
            @endauth
        </div>
    </div>
</nav>

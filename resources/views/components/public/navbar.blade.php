<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="{ 'bg-white/80 backdrop-blur-sm shadow-md': scrolled, 'bg-white border-b border-slate-100': !scrolled }"
    class="sticky top-0 z-50 transition-all duration-300 ease-in-out">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-emerald-200 shadow-lg group-hover:scale-105 transition-transform">
                        D
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-slate-800 leading-none">Desa Maju</span>
                        <span class="text-xs text-slate-500 font-medium">Kabupaten Sejahtera</span>
                    </div>
                </a>
            </div>

            <div class="hidden md:flex space-x-8 items-center">

                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-3 py-2 text-sm transition-colors duration-200 rounded-lg
                   {{ request()->routeIs('home')
                       ? 'text-emerald-700 font-bold bg-emerald-50'
                       : 'text-slate-500 font-medium hover:text-emerald-600 hover:bg-slate-50' }}">
                    Beranda
                </a>

                <div class="relative group h-full flex items-center ml-2">
                    <button
                        class="inline-flex items-center px-3 py-2 text-sm font-medium hover:bg-slate-50 rounded-lg transition duration-150 ease-in-out
    {{ request()->is('profil*') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-500 hover:text-emerald-600' }}">
                        Profil Desa
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 top-[60px] w-56 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 p-2">
                        <a href="{{ route('profil.sejarah') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg">Sejarah
                            Desa</a>
                        <a href="{{ route('profil.visi-misi') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg">Visi
                            & Misi</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg">Peta
                            & Geografis</a>
                    </div>
                </div>

                <div class="relative group h-full flex items-center">
                    <button
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-slate-500 hover:text-emerald-600 hover:bg-slate-50 rounded-lg transition duration-150 ease-in-out">
                        Pemerintahan
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 top-[60px] w-56 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 p-2">
                        <a href="{{ route('pemerintahan.struktur') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg">Struktur
                            Organisasi</a>
                        <a href="{{ route('pemerintahan.lembaga') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg">Lembaga
                            Desa</a>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-slate-500 hover:text-emerald-600 hover:bg-slate-50 rounded-lg transition duration-150 ease-in-out">
                    Berita
                </a>

                <a href="{{ route('potensi.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-slate-500 hover:text-emerald-600 hover:bg-slate-50 rounded-lg transition duration-150 ease-in-out">
                    Potensi
                </a>

                <div class="pl-4 border-l border-slate-200 flex items-center gap-3">
                    @auth
                        @if (Auth::user()->role !== 'warga')
                            <a href="{{ url('/dashboard') }}"
                                class="px-5 py-2.5 bg-slate-800 text-white text-sm font-semibold rounded-full hover:bg-slate-700 transition shadow-lg shadow-slate-300/50">
                                Dashboard
                            </a>
                        @else
                            <div class="hidden lg:flex flex-col items-end mr-2">
                                <span class="text-sm font-bold text-slate-700 leading-none">{{ Auth::user()->name }}</span>
                                <span class="text-[10px] text-slate-500 uppercase">Warga</span>
                            </div>

                            <a href="{{ route('layanan.index') }}"
                                class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 text-sm font-semibold rounded-full hover:border-emerald-500 hover:text-emerald-600 transition"
                                title="Riwayat Pengajuan">
                                Riwayat
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition"
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
                            class="px-5 py-2.5 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">
                            Layanan Surat
                        </a>
                    @endauth
                </div>
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
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

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-white border-t border-slate-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('home') }}"
                class="block px-3 py-2 rounded-md text-base font-medium 
               {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="#"
                class="block px-3 py-2 rounded-md text-base font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50">Pemerintahan</a>
            <a href="{{ route('berita.index') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50">Berita</a>
            <a href="{{ route('potensi.index') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50">Potensi</a>
            @auth
                @if (Auth::user()->role !== 'warga')
                    <a href="{{ url('/dashboard') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-slate-800 bg-slate-100">Dashboard
                        Admin</a>
                @else
                    <a href="{{ route('layanan.index') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-emerald-600 bg-emerald-50">Riwayat
                        Pengajuan</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-500 hover:bg-red-50">
                            Keluar / Logout
                        </button>
                    </form>
                @endif
            @else
                <a href="{{ route('layanan.create') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-emerald-600 font-bold bg-emerald-50">
                    Layanan Surat
                </a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-500">
                    Login Admin
                </a>
            @endauth
        </div>
    </div>
</nav>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Desa') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: #0f172a;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out md:relative md:translate-x-0 shadow-xl flex flex-col h-full">

            <div class="flex items-center justify-center h-20 border-b border-slate-800 bg-slate-950 shrink-0">
                <span class="text-2xl font-bold text-emerald-500">Admin<span class="text-white">Desa</span></span>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1 sidebar-scroll">

                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-2">Utama</p>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-emerald-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <div x-data="{ open: {{ request()->routeIs('admin.profile.*') || request()->routeIs('admin.staff.*') ? 'true' : 'false' }} }">

                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors 
        {{ request()->routeIs('admin.profile.*') || request()->routeIs('admin.staff.*')
            ? 'text-white bg-slate-800'
            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-3a1 1 0 011-1h2a1 1 0 011 1v3m-5-10v-3a1 1 0 011-1h2a1 1 0 011 1v3">
                                </path>
                            </svg>
                            <span class="font-medium">Tentang Desa</span>
                        </div>

                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="space-y-1 mt-1">

                        <a href="{{ route('admin.profile.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('admin.profile.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Profil Desa
                        </a>

                        <a href="{{ route('admin.staff.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('admin.staff.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Perangkat Desa
                        </a>

                    </div>
                </div>
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Informasi</p>

                <div x-data="{ open: {{ request()->routeIs('articles.*') || request()->routeIs('admin.potensi.*') ? 'true' : 'false' }} }">

                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors 
                            {{ request()->routeIs('articles.*') || request()->routeIs('admin.potensi.*')
                                ? 'text-white bg-slate-800'
                                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                            <span class="font-medium">Publikasi Desa</span>
                        </div>

                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="space-y-1 mt-1">

                        <a href="{{ route('articles.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('articles.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Berita & Artikel
                        </a>

                        <a href="{{ route('admin.potensi.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('admin.potensi.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Potensi (UMKM/Wisata)
                        </a>

                    </div>
                </div>

                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Kependudukan</p>

                <a href="#"
                    class="flex items-center px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Data Penduduk
                </a>

                <a href="{{ route('admin.apbdes.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-colors mb-1 {{ request()->routeIs('admin.apbdes.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    Transparansi APBDes
                </a>



                <div x-data="{ open: {{ request()->routeIs('admin.letters.*') || request()->routeIs('admin.complaints.*') ? 'true' : 'false' }} }">

                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors 
        {{ request()->routeIs('admin.letters.*') || request()->routeIs('admin.complaints.*')
            ? 'text-white bg-slate-800'
            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="font-medium">Layanan Warga</span>
                        </div>

                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="space-y-1 mt-1">

                        <a href="{{ route('admin.letters.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('admin.letters.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Permohonan Surat
                        </a>

                        <a href="{{ route('admin.complaints.index') }}"
                            class="flex items-center pl-12 pr-4 py-2.5 rounded-lg text-sm transition-colors 
            {{ request()->routeIs('admin.complaints.*')
                ? 'text-emerald-400 bg-slate-800/50 font-bold'
                : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                            Aspirasi & Pengaduan
                        </a>

                    </div>
                </div>
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Pengaturan</p>

                <a href="{{ route('admin.settings.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Setting Home
                </a>



                <div class="h-4"></div>
            </nav>

            <div class="w-full p-4 border-t border-slate-800 bg-slate-950 shrink-0">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-white shrink-0">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">Administrator</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-red-400 transition-colors"
                            title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm md:hidden flex items-center justify-between p-4 shrink-0">
                <span class="font-bold text-lg text-slate-800">Admin Panel</span>
                <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Notification Logic
        @if (session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        function confirmDelete(event, formId) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-xl shadow-xl border border-slate-100',
                    confirmButton: 'px-4 py-2 rounded-lg font-bold',
                    cancelButton: 'px-4 py-2 rounded-lg font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            })
        }
    </script>
</body>

</html>

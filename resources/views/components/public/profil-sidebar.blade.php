<div class="sticky top-24 space-y-6">

    <div class="bg-white rounded-2xl border border-slate-100 p-2 shadow-sm">

        <h3 class="px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">
            Menu Profil
        </h3>

        <nav class="space-y-1">

            <a href="{{ route('profil.sejarah') }}"
                class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 
               {{ request()->routeIs('profil.sejarah')
                   ? 'bg-emerald-50 text-emerald-700 font-bold'
                   : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profil.sejarah') ? 'text-emerald-600' : 'text-slate-400' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Sejarah Desa
            </a>

            <a href="{{ route('profil.visi-misi') }}"
                class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 
               {{ request()->routeIs('profil.visi-misi')
                   ? 'bg-emerald-50 text-emerald-700 font-bold'
                   : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profil.visi-misi') ? 'text-emerald-600' : 'text-slate-400' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Visi & Misi
            </a>

            <a href="#"
                class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 text-slate-600 hover:bg-slate-50 hover:text-emerald-600">
                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
                Letak Geografis
            </a>

            <a href="#"
                class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 text-slate-600 hover:bg-slate-50 hover:text-emerald-600">
                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Demografi Penduduk
            </a>
        </nav>
    </div>

</div>

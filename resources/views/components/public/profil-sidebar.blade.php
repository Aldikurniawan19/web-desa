<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 sticky top-24">
    <h3 class="font-bold text-lg text-slate-800 mb-4 border-b border-slate-100 pb-2">Menu Profil</h3>
    <nav class="space-y-2">
        <a href="{{ route('profil.sejarah') }}"
            class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('profil.sejarah') ? 'bg-emerald-50 text-emerald-700 font-bold border-l-4 border-emerald-500' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">
            <span class="mr-3">📜</span> Sejarah Desa
        </a>
        <a href="{{ route('profil.visi-misi') }}"
            class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('profil.visi-misi') ? 'bg-emerald-50 text-emerald-700 font-bold border-l-4 border-emerald-500' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">
            <span class="mr-3">🎯</span> Visi & Misi
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 rounded-lg transition-colors text-slate-600 hover:bg-slate-50 hover:text-emerald-600">
            <span class="mr-3">🗺️</span> Letak Geografis
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 rounded-lg transition-colors text-slate-600 hover:bg-slate-50 hover:text-emerald-600">
            <span class="mr-3">👥</span> Demografi
        </a>
    </nav>
</div>

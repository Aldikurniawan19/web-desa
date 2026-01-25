<x-layouts.admin>
    
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.complaints.index') }}" class="p-2 bg-white rounded-lg border border-slate-200 text-slate-500 hover:text-emerald-600 hover:border-emerald-300 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Detail Pengaduan</h2>
            <p class="text-slate-500 text-sm">Tiket: <span class="font-mono font-bold">{{ $complaint->ticket_id }}</span></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 uppercase tracking-wide border border-slate-200">
                        {{ $complaint->category }}
                    </span>
                    <span class="text-xs text-slate-400 font-medium">
                        {{ $complaint->created_at->translatedFormat('l, d F Y - H:i') }} WIB
                    </span>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mb-4">{{ $complaint->subject }}</h3>
                
                <div class="prose prose-slate max-w-none text-slate-600 bg-slate-50 p-4 rounded-xl border border-slate-100">
                    {!! nl2br(e($complaint->description)) !!}
                </div>

                @if($complaint->image)
                    <div class="mt-6">
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Lampiran Bukti</span>
                        <div class="rounded-xl overflow-hidden border border-slate-200">
                            <a href="{{ asset('storage/' . $complaint->image) }}" target="_blank">
                                <img src="{{ asset('storage/' . $complaint->image) }}" alt="Bukti" class="w-full h-auto object-contain max-h-[400px] bg-slate-100 hover:opacity-90 transition">
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h4 class="font-bold text-slate-800 mb-4 pb-2 border-b border-slate-50">Identitas Pelapor</h4>
                @if($complaint->is_anonymous)
                    <div class="p-4 bg-yellow-50 border border-yellow-100 rounded-lg flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <div>
                            <p class="font-bold text-yellow-800 text-sm">Pelapor Anonim</p>
                            <p class="text-xs text-yellow-700">Pelapor meminta identitasnya dirahasiakan dari publik. Namun Anda dapat melihat data asli di database jika diperlukan.</p>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-4 opacity-75">
                        <div>
                            <span class="text-xs text-slate-400 block">Nama Asli</span>
                            <span class="font-bold text-slate-800">{{ $complaint->name }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 block">WhatsApp</span>
                            <span class="font-bold text-slate-800">{{ $complaint->phone }}</span>
                        </div>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">Nama Pelapor</span>
                                <span class="font-bold text-slate-800">{{ $complaint->name }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">Nomor WhatsApp</span>
                                <span class="font-bold text-slate-800">{{ $complaint->phone }}</span>
                                <a href="https://wa.me/{{ $complaint->phone }}" target="_blank" class="text-xs text-green-600 font-bold hover:underline ml-1">(Hubungi)</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-emerald-100 sticky top-6">
                <h3 class="font-bold text-slate-800 mb-4 flex items-center">
                    <span class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 mr-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </span>
                    Tindak Lanjut
                </h3>

                <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Update Status</label>
                        <select name="status" class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition font-medium bg-slate-50">
                            <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>⏳ Menunggu</option>
                            <option value="processed" {{ $complaint->status == 'processed' ? 'selected' : '' }}>⚙️ Sedang Diproses</option>
                            <option value="completed" {{ $complaint->status == 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                            <option value="rejected" {{ $complaint->status == 'rejected' ? 'selected' : '' }}>❌ Ditolak / Spam</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tanggapan Admin</label>
                        <textarea name="admin_response" rows="6" class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm bg-slate-50" placeholder="Tulis balasan untuk pelapor di sini..." required>{{ $complaint->admin_response }}</textarea>
                        <p class="text-[10px] text-slate-400 mt-2">Balasan ini dapat dilihat oleh pelapor saat mengecek status tiket.</p>
                    </div>

                    <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5">
                        Simpan & Update
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.admin>
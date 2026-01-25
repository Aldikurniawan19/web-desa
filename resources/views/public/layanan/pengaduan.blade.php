<x-layouts.public>

    <x-public.header-breadcrumb title="Layanan Pengaduan Warga" :links="[
        'Layanan' => '#',
        'Pengaduan' => null,
    ]" />

    <div class="bg-slate-50/50 py-16 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-8 p-6 bg-emerald-50 border border-emerald-200 rounded-2xl flex flex-col md:flex-row items-center gap-4 text-center md:text-left">
                    <div
                        class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-emerald-800 text-lg">Laporan Berhasil Diterima!</h3>
                        <p class="text-emerald-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <div class="order-2 lg:order-1 lg:col-span-8">
                    <div
                        class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
                        <div class="px-8 py-6 border-b border-slate-50 bg-slate-50/30">
                            <h3 class="font-bold text-slate-800 text-lg">Formulir Laporan</h3>
                            <p class="text-slate-500 text-sm">Sampaikan aspirasi atau keluhan Anda dengan jelas.</p>
                        </div>

                        <div class="p-8">
                            <form action="{{ route('layanan.pengaduan.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm py-3"
                                            placeholder="Nama sesuai KTP" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">No. WhatsApp</label>
                                        <input type="number" name="phone"
                                            class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm py-3"
                                            placeholder="08xxxxxxxx" required>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Laporan</label>
                                    <select name="category"
                                        class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm py-3 bg-white">
                                        <option value="" disabled selected>Pilih Kategori...</option>
                                        <option value="Infrastruktur">Infrastruktur (Jalan, Jembatan, dll)</option>
                                        <option value="Administrasi">Pelayanan Administrasi</option>
                                        <option value="Keamanan">Keamanan & Ketertiban</option>
                                        <option value="Kebersihan">Sampah & Kebersihan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Laporan</label>
                                    <input type="text" name="subject"
                                        class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm py-3"
                                        placeholder="Contoh: Jalan berlubang di RT 02" required>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Isi Laporan</label>
                                    <textarea name="description" rows="5"
                                        class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm"
                                        placeholder="Jelaskan detail permasalahan, lokasi, dan waktu kejadian..." required></textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Bukti Foto
                                        (Opsional)</label>
                                    <input type="file" name="image"
                                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                                    <p class="text-xs text-slate-400 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
                                </div>

                                <div class="mb-8 p-4 bg-yellow-50 rounded-xl border border-yellow-100 flex items-start">
                                    <input type="checkbox" name="is_anonymous" id="anonim"
                                        class="mt-1 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                    <label for="anonim" class="ml-3 text-sm text-slate-600">
                                        <span class="font-bold text-slate-800 block">Lapor Sebagai Anonim</span>
                                        Identitas Anda (Nama & No HP) akan disembunyikan dari publik dan hanya diketahui
                                        oleh Admin Desa.
                                    </label>
                                </div>

                                <button type="submit"
                                    class="w-full py-4 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 transform hover:-translate-y-0.5">
                                    Kirim Laporan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2 lg:col-span-4 space-y-8">

                    <div class="bg-gradient-to-br from-emerald-600 to-teal-700 p-6 rounded-2xl shadow-lg text-white">
                        <h3 class="font-bold text-lg mb-4 border-b border-emerald-500 pb-2">Alur Pengaduan</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start">
                                <span
                                    class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center font-bold text-xs mr-3 mt-0.5">1</span>
                                <p class="text-emerald-50">Tulis laporan dengan lengkap & jelas.</p>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center font-bold text-xs mr-3 mt-0.5">2</span>
                                <p class="text-emerald-50">Admin akan memverifikasi laporan Anda.</p>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center font-bold text-xs mr-3 mt-0.5">3</span>
                                <p class="text-emerald-50">Tindak lanjut oleh petugas terkait.</p>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center font-bold text-xs mr-3 mt-0.5">4</span>
                                <p class="text-emerald-50">Laporan selesai, Anda dapat melihat tanggapan.</p>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 lg:sticky lg:top-24">
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cek Status Pengaduan
                        </h3>
                        <form action="{{ route('layanan.pengaduan.check') }}" method="POST">
                            @csrf
                            <div class="relative mb-3">
                                <input type="text" name="ticket_id"
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-200 transition text-sm bg-slate-50 uppercase placeholder:normal-case"
                                    placeholder="Masukkan Kode Tiket (Contoh: #TIK-XA12)" required>
                            </div>
                            <button type="submit"
                                class="w-full py-2.5 bg-slate-800 text-white font-bold rounded-xl text-sm hover:bg-slate-700 transition">
                                Lacak Laporan
                            </button>
                        </form>

                        @if (session('tracking_result'))
                            <div class="mt-6 pt-6 border-t border-slate-100">
                                @php $ticket = session('tracking_result'); @endphp
                                <div class="mb-2">
                                    <span class="text-xs font-bold text-slate-400 uppercase">Status Tiket:</span>
                                    @if ($ticket->status == 'pending')
                                        <span
                                            class="inline-block px-2 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded ml-2">Menunggu</span>
                                    @elseif($ticket->status == 'processed')
                                        <span
                                            class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded ml-2">Diproses</span>
                                    @elseif($ticket->status == 'completed')
                                        <span
                                            class="inline-block px-2 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded ml-2">Selesai</span>
                                    @endif
                                </div>
                                <p class="text-sm font-bold text-slate-800">{{ $ticket->subject }}</p>
                                <p class="text-xs text-slate-500 mt-1">Update terakhir:
                                    {{ $ticket->updated_at->diffForHumans() }}</p>

                                @if ($ticket->admin_response)
                                    <div class="mt-3 p-3 bg-emerald-50 rounded-lg border border-emerald-100">
                                        <span class="text-xs font-bold text-emerald-700 block mb-1">Tanggapan
                                            Admin:</span>
                                        <p class="text-xs text-slate-600">{{ $ticket->admin_response }}</p>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                class="mt-4 p-3 bg-red-50 text-red-600 text-sm rounded-lg text-center font-bold border border-red-100">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layouts.public>

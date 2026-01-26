<x-layouts.public>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <x-public.header-breadcrumb title="APBDes Tahun {{ $data ? $data->tahun : date('Y') }}" :links="['Transparansi' => '#', 'APBDes' => null]" />

    <div class="bg-slate-50 py-12 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10 text-center max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Transparansi Anggaran Desa</h2>
                <p class="text-slate-500 leading-relaxed">
                    Berikut adalah infografis Anggaran Pendapatan dan Belanja Desa (APBDes)
                    {{ $data ? 'Tahun Anggaran ' . $data->tahun : '' }}
                    sebagai wujud komitmen kami dalam pengelolaan keuangan yang transparan dan akuntabel.
                </p>
            </div>

            @if (!$data)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-12 text-center">
                    <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Data Belum Tersedia</h3>
                    <p class="text-slate-500 mt-2">Admin desa belum menginput data APBDes untuk periode ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div
                        class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border-l-4 border-emerald-500 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
                        <div class="relative z-10">
                            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Total Pendapatan</p>
                            <h3 class="text-2xl lg:text-3xl font-bold text-slate-800 mt-2">
                                Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}
                            </h3>
                            <p class="text-emerald-600 text-xs font-medium mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                Target 100%
                            </p>
                        </div>
                        <div
                            class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-emerald-50 to-transparent opacity-50">
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border-l-4 border-amber-500 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
                        <div class="relative z-10">
                            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Total Belanja</p>
                            <h3 class="text-2xl lg:text-3xl font-bold text-slate-800 mt-2">
                                Rp {{ number_format($data->total_belanja, 0, ',', '.') }}
                            </h3>
                            <p class="text-amber-600 text-xs font-medium mt-2">Alokasi Anggaran</p>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] border-l-4 border-blue-500 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
                        <div class="relative z-10">
                            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Surplus / Defisit</p>
                            <h3
                                class="text-2xl lg:text-3xl font-bold {{ $data->surplus_defisit >= 0 ? 'text-blue-600' : 'text-red-600' }} mt-2">
                                {{ $data->surplus_defisit >= 0 ? '+' : '' }} Rp
                                {{ number_format($data->surplus_defisit, 0, ',', '.') }}
                            </h3>
                            <p class="text-blue-400 text-xs font-medium mt-2">Estimasi SILPA</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">

                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6 md:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-slate-800 flex items-center">
                                <span class="w-1.5 h-6 bg-emerald-500 rounded mr-3"></span>
                                Sumber Pendapatan Desa
                            </h3>
                        </div>
                        <div id="chart-pendapatan" class="flex justify-center"></div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6 md:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-slate-800 flex items-center">
                                <span class="w-1.5 h-6 bg-amber-500 rounded mr-3"></span>
                                Rencana Belanja Desa
                            </h3>
                        </div>
                        <div id="chart-belanja"></div>
                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">
                    <div class="px-8 py-5 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 text-lg">Rincian Anggaran</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead
                                class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Uraian</th>
                                    <th class="px-6 py-4 text-right">Anggaran (Rp)</th>
                                    <th class="px-6 py-4 text-right">Persentase</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-slate-700">
                                <tr class="bg-emerald-50/30">
                                    <td colspan="3" class="px-6 py-3 font-bold text-emerald-800">1. PENDAPATAN DESA
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Dana Desa (DD)</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->pendapatan_dd, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_pendapatan > 0 ? number_format(($data->pendapatan_dd / $data->total_pendapatan) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Alokasi Dana Desa (ADD)</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->pendapatan_add, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_pendapatan > 0 ? number_format(($data->pendapatan_add / $data->total_pendapatan) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Pendapatan Asli Desa (PADes)</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->pendapatan_pades, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_pendapatan > 0 ? number_format(($data->pendapatan_pades / $data->total_pendapatan) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Pendapatan Lain-Lain</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->pendapatan_lain, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_pendapatan > 0 ? number_format(($data->pendapatan_lain / $data->total_pendapatan) * 100, 1) : 0 }}%
                                    </td>
                                </tr>

                                <tr class="bg-amber-50/30">
                                    <td colspan="3" class="px-6 py-3 font-bold text-amber-800 mt-4">2. BELANJA DESA
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Penyelenggaraan Pemerintahan</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->belanja_pemerintahan, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_belanja > 0 ? number_format(($data->belanja_pemerintahan / $data->total_belanja) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Pelaksanaan Pembangunan</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->belanja_pembangunan, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_belanja > 0 ? number_format(($data->belanja_pembangunan / $data->total_belanja) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Pembinaan Kemasyarakatan</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->belanja_kemasyarakatan, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_belanja > 0 ? number_format(($data->belanja_kemasyarakatan / $data->total_belanja) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-3 pl-10">Pemberdayaan & Tak Terduga</td>
                                    <td class="px-6 py-3 text-right font-mono">
                                        {{ number_format($data->belanja_pemberdayaan, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">
                                        {{ $data->total_belanja > 0 ? number_format(($data->belanja_pemberdayaan / $data->total_belanja) * 100, 1) : 0 }}%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {

                        // --- 1. CONFIG PIE CHART (PENDAPATAN) ---
                        var optionsPendapatan = {
                            series: [
                                {{ $data->pendapatan_dd }},
                                {{ $data->pendapatan_add }},
                                {{ $data->pendapatan_pades }},
                                {{ $data->pendapatan_lain }}
                            ],
                            chart: {
                                type: 'pie', // Pie Chart Penuh
                                height: 380,
                                fontFamily: 'inherit',
                            },
                            labels: ['Dana Desa', 'Alokasi Dana Desa', 'PADes', 'Lain-lain'],
                            colors: ['#10b981', '#34d399', '#6ee7b7', '#a7f3d0'], // Gradasi Emerald
                            dataLabels: {
                                enabled: true,
                                style: {
                                    fontSize: '14px',
                                    fontFamily: 'inherit',
                                    fontWeight: 'bold',
                                },
                                dropShadow: {
                                    enabled: false
                                }
                            },
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                y: {
                                    formatter: function(value) {
                                        return "Rp " + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                }
                            }
                        };
                        var chartPendapatan = new ApexCharts(document.querySelector("#chart-pendapatan"), optionsPendapatan);
                        chartPendapatan.render();


                        // --- 2. CONFIG BAR CHART (BELANJA) ---
                        var optionsBelanja = {
                            series: [{
                                name: 'Anggaran',
                                data: [
                                    {{ $data->belanja_pemerintahan }},
                                    {{ $data->belanja_pembangunan }},
                                    {{ $data->belanja_kemasyarakatan }},
                                    {{ $data->belanja_pemberdayaan }}
                                ]
                            }],
                            chart: {
                                type: 'bar',
                                height: 350,
                                toolbar: {
                                    show: false
                                },
                                fontFamily: 'inherit',
                            },
                            colors: ['#f59e0b'], // Warna Amber
                            plotOptions: {
                                bar: {
                                    borderRadius: 6,
                                    horizontal: true,
                                    barHeight: '60%',
                                    dataLabels: {
                                        position: 'bottom'
                                    },
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                textAnchor: 'start',
                                formatter: function(val, opt) {
                                    // Format: Label + Angka Juta
                                    return opt.w.globals.labels[opt.dataPointIndex] + ": " + (val / 1000000)
                                        .toLocaleString(
                                            'id-ID') + " Jt";
                                },
                                offsetX: 0,
                                style: {
                                    colors: ['#fff'],
                                    fontSize: '12px',
                                    fontWeight: 'bold'
                                }
                            },
                            xaxis: {
                                categories: ['Pemerintahan', 'Pembangunan', 'Kemasyarakatan', 'Pemberdayaan'],
                                labels: {
                                    show: false
                                }
                            },
                            yaxis: {
                                labels: {
                                    show: true,
                                    style: {
                                        fontSize: '13px',
                                        fontWeight: 600
                                    }
                                }
                            },
                            grid: {
                                borderColor: '#f1f5f9',
                                strokeDashArray: 4,
                                xaxis: {
                                    lines: {
                                        show: false
                                    }
                                }
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "Rp " + new Intl.NumberFormat('id-ID').format(val);
                                    }
                                }
                            }
                        };
                        var chartBelanja = new ApexCharts(document.querySelector("#chart-belanja"), optionsBelanja);
                        chartBelanja.render();

                    });
                </script>
            @endif

        </div>
    </div>
</x-layouts.public>

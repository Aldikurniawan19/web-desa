<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 0;
            /* Margin diatur oleh dompdf */
        }

        /* KOP SURAT */
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .logo {
            width: 75px;
            position: absolute;
            left: 0;
            top: 0;
        }

        .kop-teks {
            margin-left: 0;
            /* Sesuaikan jika logo menutupi */
        }

        .kop-teks h3 {
            margin: 0;
            font-size: 14pt;
            font-weight: normal;
        }

        .kop-teks h2 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
        }

        .kop-teks h1 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-teks p {
            margin: 0;
            font-size: 10pt;
            font-style: italic;
        }

        .garis-kop {
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            height: 2px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        /* ISI SURAT */
        .judul-surat {
            text-align: center;
            margin-bottom: 30px;
        }

        .judul-surat h4 {
            margin: 0;
            text-transform: uppercase;
            text-decoration: underline;
            font-size: 14pt;
        }

        .nomor-surat {
            margin: 0;
            font-size: 12pt;
        }

        .konten {
            margin-bottom: 20px;
            text-align: justify;
        }

        /* TABEL BIODATA */
        .tabel-data {
            width: 100%;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .tabel-data td {
            vertical-align: top;
            padding: 2px 0;
        }

        .label {
            width: 160px;
        }

        .titik-dua {
            width: 10px;
        }

        /* TANDA TANGAN */
        .ttd-area {
            float: right;
            width: 250px;
            text-align: center;
            margin-top: 30px;
        }

        .ttd-area p {
            margin: 0;
        }

        .nama-kades {
            margin-top: 70px;
            /* Ruang untuk tanda tangan */
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="kop-surat">
        {{-- <img src="{{ public_path('assets/logo.png') }}" class="logo" alt="Logo"> --}}

        <div class="kop-teks">
            <h3>PEMERINTAH KABUPATEN SEJAHTERA</h3>
            <h3>KECAMATAN MAKMUR</h3>
            <h1>DESA MAJU</h1>
            <p>Jalan Raya Desa Maju No. 1, Kabupaten Sejahtera, Kode Pos 12345</p>
            <p>Website: www.desamaju.id | Email: admin@desamaju.id</p>
        </div>
    </div>

    <div class="garis-kop"></div>

    <div class="judul-surat">
        <h4>{{ strtoupper($letter->type) }}</h4>
        <p class="nomor-surat">Nomor: 470 / {{ $letter->id }} / DS-MJ / {{ date('Y') }}</p>
    </div>

    <div class="konten">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Maju, Kecamatan Makmur, Kabupaten Sejahtera, menerangkan dengan
            sebenarnya bahwa:</p>
    </div>

    <table class="tabel-data">
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="titik-dua">:</td>
            <td><strong>{{ strtoupper($user->name) }}</strong></td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td class="titik-dua">:</td>
            <td>{{ $user->nik ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Tempat/Tgl Lahir</td>
            <td class="titik-dua">:</td>
            <td>{{ $user->birth_place ?? 'Jakarta' }},
                {{ \Carbon\Carbon::parse($user->birth_date ?? now())->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td class="titik-dua">:</td>
            <td>{{ $user->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td class="label">Pekerjaan</td>
            <td class="titik-dua">:</td>
            <td>{{ $user->job ?? 'Wiraswasta' }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td class="titik-dua">:</td>
            <td>{{ $user->address ?? 'Dusun I, Desa Maju' }}</td>
        </tr>
        <tr>
            <td class="label">Keperluan</td>
            <td class="titik-dua">:</td>
            <td>{{ $letter->purpose }}</td>
        </tr>
    </table>

    <div class="konten">
        <p>Orang tersebut di atas adalah benar-benar warga penduduk Desa Maju yang berdomisili di alamat tersebut. Surat
            keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
        <p>Demikian surat keterangan ini kami buat untuk dapat dipergunakan seperlunya.</p>
    </div>

    <div class="ttd-area">
        <p>Desa Maju, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Maju</p>

        <br><br><br><br>

        <p class="nama-kades">H. SUTRISNO</p>
        <p>NIP. 19750101 200001 1 001</p>
    </div>

</body>

</html>

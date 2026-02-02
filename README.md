🏛️ Sistem Informasi Desa (SID) - Desa Digital
Platform Digital Pelayanan, Administrasi, dan Transparansi Desa.

Aplikasi berbasis web yang dibangun menggunakan Laravel untuk membantu pemerintah desa dalam mengelola data kependudukan, transparansi anggaran (APBDes), layanan surat menyurat, serta publikasi berita dan potensi desa secara digital.

(Ganti link gambar di atas dengan screenshot aplikasi Anda nanti)

🚀 Fitur Utama
🌍 Halaman Publik (Warga)
Beranda Dinamis: Slider gambar & teks sambutan yang bisa diubah via Admin.

Profil Desa: Menampilkan Sejarah, Visi & Misi, dan Struktur Organisasi.

Transparansi APBDes: Infografis pendapatan, belanja, dan realisasi anggaran desa secara real-time.

Layanan Mandiri: Warga dapat mengajukan permohonan surat (KTP, SKCK, Kelahiran, dll) secara online.

Publikasi: Berita terkini dan Potensi Desa (UMKM/Wisata).

Responsive Design: Tampilan optimal di Desktop dan Mobile (HP).

🔐 Panel Admin (Perangkat Desa)
Dashboard Statistik: Ringkasan data penduduk, surat masuk, dan anggaran.

Pengaturan Website (CMS):

Ubah Nama Desa, Kabupaten, & Logo Desa.

Manajemen Slider Halaman Depan (Tambah/Hapus foto & teks).

Manajemen APBDes: Input data Anggaran vs Realisasi (Penyerapan) per bidang.

Layanan Surat: Verifikasi, tolak, atau setujui pengajuan surat dari warga.

Data Kependudukan: Manajemen data penduduk desa.

Manajemen Konten: Tulis berita, artikel, dan data potensi desa.

🛠️ Teknologi yang Digunakan
Backend: Laravel 10/11

Frontend: Blade Templating

Styling: Tailwind CSS

Interactivity: Alpine.js (untuk Navbar, Dropdown, Modal)

Database: MySQL

Icons: Heroicons / FontAwesome

⚙️ Prasyarat (Requirements)
Sebelum menginstall, pastikan komputer Anda memiliki:

PHP >= 8.1

Composer

Node.js & NPM

MySQL / MariaDB

📦 Cara Instalasi
Ikuti langkah-langkah berikut untuk menjalankan projek di komputer lokal (Localhost):

Clone Repository

Bash
git clone https://github.com/username-anda/desa-digital.git
cd desa-digital
Install Dependencies Install paket PHP dan JavaScript:

Bash
composer install
npm install
Setup Environment Salin file .env.example menjadi .env:

Bash
cp .env.example .env
Buka file .env dan sesuaikan konfigurasi database:

Cuplikan kode
DB_DATABASE=db_desa_digital
DB_USERNAME=root
DB_PASSWORD=
Generate Key

Bash
php artisan key:generate
Migrasi & Seeding Database Jalankan migrasi untuk membuat tabel dan mengisi data awal (User Admin & Setting Default):

Bash
php artisan migrate --seed
Setup Storage Link Penting! Lakukan ini agar gambar logo dan slider yang diupload bisa muncul:

Bash
php artisan storage:link
Jalankan Aplikasi Buka dua terminal terpisah:

Terminal 1 (Laravel Server):

Bash
php artisan serve
Terminal 2 (Vite - Compile Assets):

Bash
npm run dev
Selesai! Buka browser dan akses: http://127.0.0.1:8000

🔑 Akun Default (Login)
Gunakan akun berikut untuk masuk ke Panel Admin:

Email: admin@desa.id

Password: password

(Catatan: Akun ini dibuat melalui Database Seeder)

📂 Struktur Folder Penting
app/Models - Model database (Apbdes, SiteSetting, HeroSlide, dll).

app/Http/Controllers - Logika aplikasi (AdminSetting, HomeController, dll).

resources/views/public - Tampilan halaman depan (Warga).

resources/views/admin - Tampilan panel admin.

resources/views/components - Komponen UI ulang-pakai (Navbar, Sidebar).

routes/web.php - Definisi jalur URL.

🤝 Kontribusi
Jika Anda ingin berkontribusi:

Fork repository ini.

Buat branch fitur baru (git checkout -b fitur-baru).

Commit perubahan Anda (git commit -m 'Menambah fitur X').

Push ke branch (git push origin fitur-baru).

Buat Pull Request.

📝 Lisensi
Projek ini bersifat Open Source di bawah lisensi MIT.

Dibuat dengan ❤️ untuk Kemajuan Desa Indonesia.

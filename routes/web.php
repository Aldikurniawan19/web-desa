<?php

use App\Http\Controllers\AdminApbdesController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Controllers\AdminHeroController;
use App\Http\Controllers\AdminLetterController;
use App\Http\Controllers\AdminPotensiController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TransparencyController;
use App\Models\Article;
use App\Models\LetterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'articles'])->name('berita.index');
Route::get('/berita/{slug}', [PublicController::class, 'showBerita'])->name('berita.show');



Route::get('/profil/visi-misi', [PublicController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/sejarah', [PublicController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/pemerintahan/lembaga', [PemerintahanController::class, 'lembaga'])->name('pemerintahan.lembaga');

Route::prefix('transparansi')->name('transparansi.')->group(function () {
    Route::get('/apbdes', [TransparencyController::class, 'apbdes'])->name('apbdes');
    Route::get('/realisasi', [TransparencyController::class, 'realisasi'])->name('realisasi');
    Route::get('/laporan-keuangan', [TransparencyController::class, 'laporan'])->name('laporan');
    Route::get('/program-kerja', [TransparencyController::class, 'program'])->name('program');
});

Route::get('/potensi-desa', [PotensiController::class, 'index'])->name('potensi.index');
// Group Pemerintahan
Route::prefix('pemerintahan')->name('pemerintahan.')->group(function () {
    Route::get('/struktur-organisasi', [PemerintahanController::class, 'struktur'])->name('struktur');
    Route::get('/perangkat-desa', [PemerintahanController::class, 'perangkat'])->name('perangkat');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'warga') {
        return redirect()->route('layanan.index');
    }

    $total_warga = User::where('role', 'warga')->count();
    $surat_pending = LetterRequest::where('status', 'pending')->count();
    $total_berita = Article::count();
    $latest_letters = LetterRequest::with('user')->latest()->take(5)->get();
    return view('dashboard', compact('total_warga', 'surat_pending', 'total_berita', 'latest_letters'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('admin/articles', ArticleController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/profil-desa', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::put('/admin/profil-desa', [AdminProfileController::class, 'update'])->name('admin.profile.update');

    Route::resource('admin/apbdes', AdminApbdesController::class, ['as' => 'admin']);
    Route::get('/layanan', [LetterRequestController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/buat', [LetterRequestController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LetterRequestController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/surat/{id}/download', [LetterRequestController::class, 'download'])->name('layanan.surat.download');


    Route::get('/admin/pengaduan', [AdminComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::get('/admin/pengaduan/{id}', [AdminComplaintController::class, 'show'])->name('admin.complaints.show');
    Route::put('/admin/pengaduan/{id}', [AdminComplaintController::class, 'update'])->name('admin.complaints.update');

    Route::get('/layanan/pengaduan', [ComplaintController::class, 'index'])->name('layanan.pengaduan');
    Route::post('/layanan/pengaduan', [ComplaintController::class, 'store'])->name('layanan.pengaduan.store');
    Route::post('/layanan/pengaduan/cek', [ComplaintController::class, 'checkStatus'])->name('layanan.pengaduan.check');

    Route::resource('admin/staff', AdminStaffController::class, ['names' => 'admin.staff']);

    Route::resource('admin/potensi', AdminPotensiController::class, ['names' => 'admin.potensi']);
    Route::get('/admin/settings', [AdminSettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/admin/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    Route::resource('admin/hero', AdminHeroController::class, ['as' => 'admin'])
        ->only(['store', 'destroy']);

    Route::get('/admin/surat', [AdminLetterController::class, 'index'])->name('admin.letters.index');
    Route::get('/admin/surat/{id}', [AdminLetterController::class, 'show'])->name('admin.letters.show');
    Route::put('/admin/surat/{id}', [AdminLetterController::class, 'update'])->name('admin.letters.update');
    Route::delete('/admin/surat/{id}', [AdminLetterController::class, 'destroy'])->name('admin.letters.destroy');
});

require __DIR__ . '/auth.php';

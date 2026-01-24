<?php

use App\Http\Controllers\AdminLetterController;
use App\Http\Controllers\AdminPotensiController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Models\Article;
use App\Models\LetterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'articles'])->name('berita.index');
Route::get('/berita/{slug}', [PublicController::class, 'showBerita'])->name('berita.show');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [ProfilDesaController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfilDesaController::class, 'visiMisi'])->name('visi-misi');
    // Nanti bisa tambah geografis, demografi, dll disini
});
Route::get('/pemerintahan/lembaga', [PemerintahanController::class, 'lembaga'])->name('pemerintahan.lembaga');
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

    // BENAR (Lewat Controller agar data $profile terkirim)
    Route::get('/profil/visi-misi', [PublicController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/profil/sejarah', [PublicController::class, 'sejarah'])->name('profil.sejarah');

    Route::get('/layanan', [LetterRequestController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/buat', [LetterRequestController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LetterRequestController::class, 'store'])->name('layanan.store');

    Route::resource('admin/staff', AdminStaffController::class, ['names' => 'admin.staff']);

    Route::resource('admin/potensi', AdminPotensiController::class, ['names' => 'admin.potensi']);
    // --- ADMIN SURAT ---
    // Kita gunakan custom route agar URL-nya rapi (admin/surat)
    Route::get('/admin/surat', [AdminLetterController::class, 'index'])->name('admin.letters.index');
    Route::get('/admin/surat/{id}', [AdminLetterController::class, 'show'])->name('admin.letters.show');
    Route::put('/admin/surat/{id}', [AdminLetterController::class, 'update'])->name('admin.letters.update');
    Route::delete('/admin/surat/{id}', [AdminLetterController::class, 'destroy'])->name('admin.letters.destroy');
});

require __DIR__ . '/auth.php';

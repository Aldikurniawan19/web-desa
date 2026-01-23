<?php

use App\Http\Controllers\AdminLetterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [PublicController::class, 'showBerita'])->name('berita.show');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [ProfilDesaController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfilDesaController::class, 'visiMisi'])->name('visi-misi');
    // Nanti bisa tambah geografis, demografi, dll disini
});

Route::get('/dashboard', function () {
    // KEAMANAN: Cek jika yang login adalah Warga
    if (Auth::user()->role === 'warga') {
        return redirect()->route('layanan.index');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('admin/articles', ArticleController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/layanan', [LetterRequestController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/buat', [LetterRequestController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LetterRequestController::class, 'store'])->name('layanan.store');

    // --- ADMIN SURAT ---
    // Kita gunakan custom route agar URL-nya rapi (admin/surat)
    Route::get('/admin/surat', [AdminLetterController::class, 'index'])->name('admin.letters.index');
    Route::get('/admin/surat/{id}', [AdminLetterController::class, 'show'])->name('admin.letters.show');
    Route::put('/admin/surat/{id}', [AdminLetterController::class, 'update'])->name('admin.letters.update');
    Route::delete('/admin/surat/{id}', [AdminLetterController::class, 'destroy'])->name('admin.letters.destroy');
});

require __DIR__ . '/auth.php';

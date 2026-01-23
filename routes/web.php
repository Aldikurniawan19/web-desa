<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
// Group Profil Desa
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [ProfilDesaController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfilDesaController::class, 'visiMisi'])->name('visi-misi');
    // Nanti bisa tambah geografis, demografi, dll disini
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('admin/articles', ArticleController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

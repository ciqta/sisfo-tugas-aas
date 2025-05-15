<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware; 

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'Login'])->name('auth.login');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::post('/barang/store', [BarangController::class, 'store'])->name('barang');
        Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

        Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori.index');
        Route::get('/kategori-barang/create', [KategoriBarangController::class, 'create'])->name('kategori.create');
        Route::get('/kategori-barang/{id}', [KategoriBarangController::class, 'show'])->name('kategori.show');
        Route::get('/kategori-barang/{id}/edit', [KategoriBarangController::class, 'edit'])->name('kategori.edit');
        Route::post('/kategori-barang/store', [KategoriBarangController::class, 'store'])->name('kategori.store');
        Route::put('/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori-barang/{id}', [KategoriBarangController::class, 'destroy'])->name('kategori.destroy');

        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
        Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/store', [UserController::class, 'store'])->name('users');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Route::get('/detail-pengembalian', [DetailPengembalianController::class, 'index'])->name('detail-pengembalian.index');
        // Route::get('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'show'])->name('detail-pengembalian.show');
        // Route::post('/detail-pengembalian/store', [DetailPengembalianController::class, 'store'])->name('detail-pengembalian');
        // Route::put('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'update'])->name('detail-pengembalian.update');
        // Route::delete('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'destroy'])->name('detail-pengembalian.destroy');
});

// Logout (web)
Route::post('/logout', [AuthController::class, 'logoutWeb'])->name('logout');

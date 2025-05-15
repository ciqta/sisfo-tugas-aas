<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\DetailPengembalianController;
use App\Http\Controllers\UserController;

// ------------------- AUTH -------------------
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'apiLogout'])->name('logout');
});

// // ------------------- USER ROLE -------------------
// Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
//     Route::get('/user', [UserController::class, 'index']);

//   // ---------------- DATA BARANG ----------------
//     Route::get('/barang', [BarangController::class, 'index']);
//     Route::get('/barang/{id}', [BarangController::class, 'show']);

//     // ---------------- MENGAJUKAN PEMINJAMAN ----------------
//     Route::post('/detail-peminjaman', [DetailPeminjamanController::class, 'store']);
//     Route::post('/peminjaman', [PeminjamanController::class, 'store']);
//     Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);
//     Route::get('/peminjaman-user', [PeminjamanController::class, 'userPeminjaman']);

//     // ---------------- MENGAJUKAN PENGEMBALIAN ----------------
//     Route::post('/detail-pengembalian', [DetailPengembalianController::class, 'store']);
// });

// ------------------- ADMIN ROLE -------------------
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // ---------------- USERS ----------------
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // ---------------- BARANG ----------------
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // ---------------- KATEGORI BARANG ----------------
    Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori-barang.index');
    Route::post('/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori-barang.store');
    Route::get('/kategori-barang/{id}', [KategoriBarangController::class, 'show'])->name('kategori-barang.show');
    Route::put('/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori-barang.update');
    Route::delete('/kategori-barang/{id}', [KategoriBarangController::class, 'destroy'])->name('kategori-barang.destroy');

    // // ---------------- PEMINJAMAN ----------------
    // Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    // Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    // Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    // Route::put('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    // Route::put('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

    // // ---------------- DETAIL PEMINJAMAN ----------------
    // Route::get('/detail-peminjaman', [DetailPeminjamanController::class, 'index'])->name('detail-peminjaman.index');
    // Route::get('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'show'])->name('detail-peminjaman.show');
    // Route::put('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'update'])->name('detail-peminjaman.update');
    // Route::delete('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'destroy'])->name('detail-peminjaman.destroy');


    // // ---------------- DETAIL PENGEMBALIAN ----------------
    // Route::get('/detail-pengembalian', [DetailPengembalianController::class, 'index'])->name('detail-pengembalian.index');
    // Route::get('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'show'])->name('detail-pengembalian.show');
    // Route::put('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'update'])->name('detail-pengembalian.update');
    // Route::delete('/detail-pengembalian/{id}', [DetailPengembalianController::class, 'destroy'])->name('detail-pengembalian.destroy');
    // Route::put('/detail-pengembalian/{id}/approve', [DetailPengembalianController::class, 'approve'])->name('detail-pengembalian.approve');
    // Route::put('/detail-pengembalian/{id}/reject', [DetailPengembalianController::class, 'reject'])->name('detail-pengembalian.reject');
});
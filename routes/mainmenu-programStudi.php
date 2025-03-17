<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

// Route::middleware('auth')->group(function () {
//     Route::middleware('role:Admin|Purchasing|Gudang')->prefix('prodi')->group(function () {
//         Route::get('/index', [OutcomingController::class, 'index'])->name('outcoming.index');
//         Route::get('/cetak/{id}', [OutcomingController::class, 'cetak_pdf'])->name('outcoming.print');
//     });
//     Route::middleware('role:Admin')->prefix('prodi')->group(function () {
//         Route::get('/create', [OutcomingController::class, 'create'])->name('outcoming.create');
//         Route::post('/create', [OutcomingController::class, 'store'])->name('outcoming.store');
//         Route::get('/show/{id}', [OutcomingController::class, 'show'])->name('outcoming.show');
//         Route::get('/edit/{id}', [OutcomingController::class, 'edit'])->name('outcoming.edit');
//         Route::put('/{id}', [OutcomingController::class, 'update'])->name('outcoming.update');
//         Route::delete('/{id}', [OutcomingController::class, 'destroy'])->name('outcoming.destroy');
//     });
// });

Route::middleware('auth')->group(function () {

    // Rute untuk melihat barang keluar (role: Admin, Purchasing, Gudang)
    Route::middleware('permission:lihat-kampus')->prefix('programstudi')->group(function () {
        Route::get('/index', [ProgramStudiController::class, 'index'])->name('programstudi.index');
        Route::get('/cetak/{id}', [ProgramStudiController::class, 'cetak_pdf'])->name('programstudi.print');
    });

    // Rute untuk menambah barang keluar (hanya Admin)
    Route::middleware('permission:tambah-kampus')->prefix('programstudi')->group(function () {
        Route::get('/create', [ProgramStudiController::class, 'create'])->name('programstudi.create');
        Route::post('/create', [ProgramStudiController::class, 'store'])->name('programstudi.store');
    });

    // Rute untuk mengedit barang keluar (hanya Admin)
    Route::middleware('permission:edit-kampus')->prefix('programstudi')->group(function () {
        Route::get('/edit/{id}', [ProgramStudiController::class, 'edit'])->name('programstudi.edit');
        Route::put('/{id}', [ProgramStudiController::class, 'update'])->name('programstudi.update');
    });

    // Rute untuk menghapus barang keluar (hanya Admin)
    Route::middleware('permission:hapus-kampus')->prefix('programstudi')->group(function () {
        Route::delete('/{id}', [ProgramStudiController::class, 'destroy'])->name('programstudi.destroy');
    });

    // Rute untuk melihat detail barang keluar (hanya Admin)
    Route::middleware('permission:lihat-kampus')->prefix('programstudi')->group(function () {
        Route::get('/show/{id}', [ProgramStudiController::class, 'show'])->name('programstudi.show');
    });
});


Route::middleware('auth')->group(function () {

    // Rute untuk melihat barang keluar (role: Admin, Purchasing, Gudang)
    Route::middleware('permission:lihat-kampus')->prefix('fakultas')->group(function () {
        Route::get('/index', [FakultasController::class, 'index'])->name('fakultas.index');
        Route::get('/cetak/{id}', [FakultasController::class, 'cetak_pdf'])->name('fakultas.print');
    });

    // Rute untuk menambah barang keluar (hanya Admin)
    Route::middleware('permission:tambah-kampus')->prefix('fakultas')->group(function () {
        Route::get('/create', [FakultasController::class, 'create'])->name('fakultas.create');
        Route::post('/create', [FakultasController::class, 'store'])->name('fakultas.store');
    });

    // Rute untuk mengedit barang keluar (hanya Admin)
    Route::middleware('permission:edit-kampus')->prefix('fakultas')->group(function () {
        Route::get('/edit/{id}', [FakultasController::class, 'edit'])->name('fakultas.edit');
        Route::put('/{id}', [FakultasController::class, 'update'])->name('fakultas.update');
    });

    // Rute untuk menghapus barang keluar (hanya Admin)
    Route::middleware('permission:hapus-kampus')->prefix('fakultas')->group(function () {
        Route::delete('/{id}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');
    });

    // Rute untuk melihat detail barang keluar (hanya Admin)
    Route::middleware('permission:lihat-kampus')->prefix('fakultas')->group(function () {
        Route::get('/show/{id}', [FakultasController::class, 'show'])->name('fakultas.show');
    });
});

<?php

use App\Http\Controllers\FinalReportController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth')->group(function () {

    // Rute untuk melihat barang masuk (Admin, Gudang, Purchasing)
    Route::middleware('permission:lihat-laporan-akhir')->prefix('report')->group(function () {
        Route::get('/index/{id}', [FinalReportController::class, 'indexMahasiswa'])->name('report.indexMahasiswa');
        Route::get('/index', [FinalReportController::class, 'index'])->name('report.index');
        Route::get('/cetak', [FinalReportController::class, 'cetak_pdf'])->name('report.print');
    });

    Route::middleware('role:Admin PT|Prodi')->prefix('report')->group(function () {
        Route::get('/indexDosen', [FinalReportController::class, 'indexDosen'])->name('report.indexDosen');
    });

    // Rute untuk menambah barang masuk (Admin, Gudang)
    Route::middleware('permission:tambah-laporan-akhir')->prefix('report')->group(function () {
        Route::post('/create', [FinalReportController::class, 'store'])->name('report.store');
    });
    
    Route::middleware('permission:review-laporan-akhir')->prefix('report')->group(function () {
        Route::get('/review/{id}', [FinalReportController::class, 'review'])->name('report.review');
        Route::post('/review/{id}', [FinalReportController::class, 'reviewstore'])->name('report.reviewstore');
    });

    // Rute untuk mengedit barang masuk (Admin, Gudang)
    Route::middleware('permission:edit-laporan-akhir')->prefix('report')->group(function () {
        Route::get('/edit/{id}', [FinalReportController::class, 'edit'])->name('report.edit');
        Route::put('/{id}', [FinalReportController::class, 'update'])->name('report.update');
    });

    // Rute untuk menghapus barang masuk (Admin, Gudang)
    Route::middleware('permission:hapus-laporan-akhir')->prefix('report')->group(function () {
        Route::delete('/{id}', [FinalReportController::class, 'destroy'])->name('report.destroy');
    });

    // Rute untuk melihat detail barang masuk (Admin, Gudang)
    Route::middleware('permission:lihat-laporan-akhir')->prefix('report')->group(function () {
        Route::get('/show/{id}', [FinalReportController::class, 'show'])->name('report.show');
    });
});


// Route::middleware('auth')->group(function () {
//     Route::middleware('role:Admin|Gudang|Purchasing')->prefix('incoming')->group(function () {
//         Route::get('/index', [FinalReportController::class, 'index'])->name('incoming.index');
//     });
//     Route::middleware('role:Admin|Gudang')->prefix('incoming')->group(function () {
//         Route::get('/create', [FinalReportController::class, 'create'])->name('incoming.create');
//         Route::post('/create', [FinalReportController::class, 'store'])->name('incoming.store');
//         Route::get('/show/{id}', [FinalReportController::class, 'show'])->name('incoming.show');
//         Route::get('/edit/{id}', [FinalReportController::class, 'edit'])->name('incoming.edit');
//         Route::put('/{id}', [FinalReportController::class, 'update'])->name('incoming.update');
//         Route::delete('/{id}', [FinalReportController::class, 'destroy'])->name('incoming.destroy');
//     });
// });

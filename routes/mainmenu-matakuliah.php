<?php

use App\Http\Controllers\CplMikroskilController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\MataKuliahController;
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
    Route::middleware('permission:lihat-mikroskill')->prefix('matakuliah')->group(function () {
        Route::get('/index', [MataKuliahController::class, 'index'])->name('matakuliah.index');
    });
    });
    // Rute untuk menambah barang masuk (Admin, Gudang)
    Route::middleware('permission:tambah-mikroskill')->prefix('matakuliah')->group(function () {
        Route::post('/updateInline', [MataKuliahController::class, 'updateInline'])->name('matakuliah.updateInline');
        Route::post('/create', [MataKuliahController::class, 'store'])->name('matakuliah.store');
        // Route::post('/review{id}', [MataKuliahController::class, 'reviewstore'])->name('mikroskil.reviewstore');
    });

    // Rute untuk mengedit barang masuk (Admin, Gudang)
    Route::middleware('permission:edit-mikroskill')->prefix('matakuliah')->group(function () {
        Route::get('/edit/{id}', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
        Route::put('/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    });

    // Rute untuk menghapus barang masuk (Admin, Gudang)
    Route::middleware('permission:hapus-mikroskill')->prefix('matakuliah')->group(function () {
        Route::delete('/delete/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');
    });

    // Rute untuk melihat detail barang masuk (Admin, Gudang)
    Route::middleware('permission:lihat-mikroskill')->prefix('matakuliah')->group(function () {
        Route::get('/show/{id}', [MataKuliahController::class, 'show'])->name('matakuliah.show');
    });
// });


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
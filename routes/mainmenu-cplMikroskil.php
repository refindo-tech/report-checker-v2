<?php

use App\Http\Controllers\CplMikroskilController;
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
    Route::middleware('permission:lihat-mikroskill')->prefix('mikroskil')->group(function () {
        Route::get('/index', [CplMikroskilController::class, 'index'])->name('mikroskil.index');
    });
    });
    // Rute untuk menambah barang masuk (Admin, Gudang)
    Route::middleware('permission:tambah-mikroskill')->prefix('mikroskil')->group(function () {
        Route::post('/updateInline', [CplMikroskilController::class, 'updateInline'])->name('mikroskil.updateInline');
        Route::post('/create', [CplMikroskilController::class, 'store'])->name('mikroskil.store');
        // Route::post('/review{id}', [CplMikroskilController::class, 'reviewstore'])->name('mikroskil.reviewstore');
    });

    // Rute untuk mengedit barang masuk (Admin, Gudang)
    Route::middleware('permission:edit-mikroskill')->prefix('mikroskil')->group(function () {
        Route::get('/edit/{id}', [CplMikroskilController::class, 'edit'])->name('mikroskil.edit');
        Route::put('/{id}', [CplMikroskilController::class, 'update'])->name('mikroskil.update');
    });

    // Rute untuk menghapus barang masuk (Admin, Gudang)
    Route::middleware('permission:hapus-mikroskill')->prefix('mikroskil')->group(function () {
        Route::delete('/delete/{id}', [CplMikroskilController::class, 'destroy'])->name('mikroskil.destroy');
    });

    // Rute untuk melihat detail barang masuk (Admin, Gudang)
    Route::middleware('permission:lihat-mikroskill')->prefix('mikroskil')->group(function () {
        Route::get('/show/{id}', [CplMikroskilController::class, 'show'])->name('mikroskil.show');
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
<?php

use App\Http\Controllers\AssessmentController;
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
    Route::middleware('permission:lihat-assessment')->prefix('assessment')->group(function () {
        Route::get('/index/{id}', [AssessmentController::class, 'index'])->name('assessment.index');
        Route::get('/cetak-rekomendasi/{id}', [AssessmentController::class, 'print'])->name('rekomendasi.print');
        Route::get('/cetak-nilai', [AssessmentController::class, 'printScore'])->name('assessment.printscore');
    });
    });
    Route::middleware('role:Prodi|SuperAdmin')->prefix('assessment')->group(function () {
        Route::get('/indexDosen', [AssessmentController::class, 'indexDosen'])->name('assessment.indexDosen');
    });
    
    // Rute untuk menambah data penilaian
    Route::middleware('permission:tambah-assessment')->prefix('assessment')->group(function () {
        Route::post('/updateInline', [AssessmentController::class, 'updateInline'])->name('assessment.updateInline');
        // Route::post('/create', [AssessmentController::class, 'store'])->name('assessment.store');
        Route::post('/simpan-nilai', [AssessmentController::class, 'store'])->name('assessment.store');
        // Route::post('/review{id}', [CplMikroskilController::class, 'reviewstore'])->name('mikroskil.reviewstore');
    });

    // Rute untuk mengedit peniliain
    Route::middleware('permission:edit-assessment')->prefix('assessment')->group(function () {
        Route::get('/edit/{id}', [AssessmentController::class, 'edit'])->name('assessment.edit');
        Route::put('/{id}', [AssessmentController::class, 'update'])->name('assessment.update');
    });

    // Rute untuk menghapus barang masuk (Admin, Gudang)
    Route::middleware('permission:hapus-assessment')->prefix('assessment')->group(function () {
        Route::delete('/delete/{id}', [AssessmentController::class, 'destroy'])->name('assessment.destroy');
    });

    // Rute untuk melihat detail barang masuk (Admin, Gudang)
    Route::middleware('permission:lihat-assessment')->prefix('assessment')->group(function () {
        Route::get('/show/{id}', [AssessmentController::class, 'show'])->name('assessment.show');
    });

    // Rute untuk mengedit barang masuk (Admin, Gudang)
    // Route::middleware('permission:edit-assessment')->prefix('mikroskil')->group(function () {
    //     Route::get('/edit/{id}', [CplMikroskilController::class, 'edit'])->name('mikroskil.edit');
    //     Route::put('/{id}', [CplMikroskilController::class, 'update'])->name('mikroskil.update');
    // });

    // Rute untuk menghapus barang masuk (Admin, Gudang)
    // Route::middleware('permission:hapus-assessment')->prefix('mikroskil')->group(function () {
    //     Route::delete('/delete/{id}', [CplMikroskilController::class, 'destroy'])->name('mikroskil.destroy');
    // });

    // Rute untuk melihat detail barang masuk (Admin, Gudang)
    // Route::middleware('permission:lihat-assessment')->prefix('mikroskil')->group(function () {
    //     Route::get('/show/{id}', [CplMikroskilController::class, 'show'])->name('mikroskil.show');
    // });
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
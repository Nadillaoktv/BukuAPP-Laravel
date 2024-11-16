<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembacaController;
use App\Http\Controllers\Bukus;



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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::prefix('/buku')->name('buku.')->group(function(){
    Route::get('/data',  [BukuController::class, 'index'])->name('data');
    Route::get('/tambah-buku', [BukuController::class, 'create'])->name('tambah_buku');
    Route::post('/tambah-buku', [BukuController::class, 'store'])->name('tambah_buku.formulir');
    // kurung kurawal di path disebut path dinamis (akses data spesifik)
    Route::delete('/hapus/{id}', [BukuController::class, 'destroy'])->name('hapus');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [BukuController::class, 'update'])->name('edit.formulir');
    Route::get('/export-excel', [BukuController::class, 'exportExcel'])->name('excel');

});

Route::prefix('/pembaca')->name('pembaca.')->group(function() {
    Route::get('/data', [PembacaController::class, 'index'])->name('data');
    Route::get('/tambah', [PembacaController::class, 'create'])->name('tambah');
    Route::post('/tambah/akun', [PembacaController::class, 'store'])->name('tambah.akun');
    Route::delete('/{id}', [PembacaController::class, 'destroy'])->name('destroy'); // Untuk hapus pembaca
    Route::get('/pembaca/{id}/edit', [PembacaController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [PembacaController::class, 'update'])->name('edit.formulir');
    Route::get('/export-excel', [PembacaController::class, 'exportExcel'])->name('export');
});


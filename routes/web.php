<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KategoriController;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PeminjamanController::class, 'index'])->name('');
// Route::get('/index', function () {return view('index');});

Route::get('/admin', function () { return view('admin'); })->middleware('checkRole:admin, petugas');
Route::get('/petugasss', function () { return view('petugas'); })->middleware('checkRole:petugas');
Route::resource('buku', BukuController::class)->middleware('checkRole:admin,petugas');
Route::resource('kategori', KategoriController::class)->middleware('checkRole:admin,petugas');
Route::resource('pinjam', PeminjamanController::class)->middleware('checkRole:peminjam');
Route::resource('ulasan', UlasanController::class)->middleware('checkRole:peminjam');
Route::resource('kembali', PengembalianController::class)->middleware('checkRole:peminjam');
Route::resource('koleksi', KoleksiController::class)->middleware('checkRole:peminjam');
Route::resource('petugas', PetugasController::class)->middleware('checkRole:admin');
Route::resource('histori', HistoriController::class)->middleware('checkRole:admin');







<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Auth::routes();
Route::get('/dashboard', [SuperAdminController::class, 'home']);

Route::get('/kelola_mhs_asli', [SuperAdminController::class, 'kelola_mhs_asli'])->name('SuperAdmin/kelola_mhs_asli')->middleware();
Route::get('/add_mhs_asli', [SuperAdminController::class, 'add_mhs_asli'])->name('SuperAdmin/create');
Route::get('/jurusan', [SuperAdminController::class, 'jurusan'])->name('SuperAdmin/jurusan');
Route::post('/store_mahasiswa', [SuperAdminController::class, 'store_mahasiswa'])->name('SuperAdmin/store');
Route::get('/edit/{id}', [SuperAdminController::class, 'edit'])->name('SuperAdmin/edit');
Route::put('/update/mahasiswa/{id}', [SuperAdminController::class, 'update'])->name('SuperAdmin/update');
Route::delete('SuperAdmin/delete/{id}', [SuperAdminController::class, 'delete'])->name('SuperAdmin/delete');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('SuperAdmin/jurusan/create');
Route::post('/jurusan/store', [jurusanController::class, 'store']);
Route::get('/nilai', [SuperAdminController::class, 'nilai'])->name('SuperAdmin/nilai');

Route::get('/jurusan/delete/{id}', [JurusanController::class, 'delete'])->name('SuperAdmin/jurusan/delete');
Route::get('/edit/{id}', [JurusanController::class, 'edit'])->name('SuperAdmin/edit');
Route::post('/store_nilai', [SuperAdminController::class, 'store_nilai'])->name('SuperAdmin/store');

Route::get('/laporan', [LaporanController::class, 'laporan'])->name('Laporan/laporan');
Route::get('/Laporan/Mahasiswa', [LaporanController::class, 'mahasiswa'])->name('SuperAdmin/laporan/mahasiswa');
Route::get('/Laporan/Cetak_Mahasiswa', [LaporanController::class, 'cetak_pdf'])->name('Laporan/cetak_pdf');
Route::get('/Laporan/Cetak_Mahasiswa_Asing', [LaporanController::class, 'cetak_asing'])->name('Laporan/cetak_mahasingasing');
Route::get('/Laporan/Cetak_Akumulasi', [LaporanController::class, 'pdf_akumulasi'])->name('Laporan/cetak_akumulasi');
Route::get('/Laporan/Mahasiswa_Asing', [LaporanController::class, 'mhsasing'])->name('SuperAdmin/laporan/mhsasing');
Route::get('/Laporan/Akumulasi_Mahasiswa', [LaporanController::class, 'akumulasi'])->name('SuperAdmin/laporan/akumulasi_mahasiswa');

//mhs asing
Route::get('/kelola_mhs_asing', [MahasiswaController::class, 'kelola_mhs_asing'])->name('Mahasiswa/index');
Route::get('/add_mhs_asing', [MahasiswaController::class, 'add_mhs_asing'])->name('Mahasiswa/create');
Route::put('/update/{id}', [MahasiswaController::class, 'update'])->name('Mahasiswa/update');
Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('Mahasiswa/edit');
Route::post('/store', [MahasiswaController::class, 'store_asing'])->name('Mahasiswa/store');
Route::delete('Mahasiswa/delete/{id}', [MahasiswaController::class, 'delete'])->name('Mahasiswa/delete');
Route::get('/nilai2', [MahasiswaController::class, 'nilai2'])->name('Mahasiswa/nilai2');
Route::post('/store_nilai2', [MahasiswaController::class, 'store_nilai2'])->name('Mahasiswa/store');



Route::group(['prefix' => 'Admin', 'middleware' => ['Admin']], function () {
});
Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['SuperAdmin']], function () {
});



// Route::group(['prefix' => 'Admin', 'middleware' => ['Admin']], function () {
//     Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
//     Route::get('/kelola_mhs_asing', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asing'])->name('Admin/kelola_mhs_asing');
//     Route::get('/kelola_mhs_asli', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asli']);
    
// });
// Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['SuperAdmin']], function () {
    
// });
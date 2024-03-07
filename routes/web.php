<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthPublicController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilPublicController;
use App\Http\Controllers\KatakunciController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanPublicController;
use App\Http\Controllers\SuratController;
use App\Models\ModelPengaduan;
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
// auth --
// registrasi

// public---
// registration 
Route::get('/registrasi', [AuthPublicController::class, 'show'])->name('public-register');
Route::get('/registrasi', [AuthPublicController::class, 'register'])->name('public-register');
Route::post('/registrasi', [AuthPublicController::class, 'register'])->name('public-register');
Route::get('/pdf', [SuratController::class, 'viewPdf'])->name('pdf');

// login
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthPublicController::class, 'show'])->name('public-login');
Route::post('/login', [AuthPublicController::class, 'login'])->name('public-login');
Route::get('/logout', [AuthPublicController::class, 'logout'])->name('public-logout');


// admin---
// login 
Route::get('/login/admin', [AuthAdminController::class, 'show'])->name('admin-login');
Route::get('/admin/registrasi', [AuthAdminController::class, 'register'])->name('admin-register');
Route::post('/admin/registrasi', [AuthAdminController::class, 'register'])->name('admin-register');
Route::get('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin-logout');

Route::group(['middleware' => 'auth.public'], function () {
    // Rute-rute yang memerlukan autentikasi untuk pengguna publik
    Route::get('/Beranda', [BerandaController::class, 'show'])->name('Beranda');
    Route::get('/kelola-pengaduan/detail/{id}', [PengaduanController::class, 'unduh'])->name('unduh-surat');
    Route::get('/hasil', [HasilPublicController::class, 'show'])->name('public-hasil');
    Route::get('/hasil/{id}', [HasilPublicController::class, 'detail'])->name('public-hasil-detail');
    Route::get('/pengaduan', [PengaduanPublicController::class, 'show'])->name('public-pengaduan');
    Route::post('/pengaduan', [PengaduanPublicController::class, 'submit'])->name('public-pengaduan');
    Route::post('/profile-update', [AuthPublicController::class, 'submitUpdate'])->name('update-profile');

    // public surat
    Route::get('/surat', [SuratController::class, 'show_surat'])->name('daftar-surat');
    Route::get('/surat/{id}', [SuratController::class, 'detail_surat'])->name('public-detail-surat');
    Route::get('/surat/unduh/{id}', [SuratController::class, 'public_unduh'])->name('public-unduh-pdf');
});
Route::post('/login/admin', [AuthAdminController::class, 'login'])->name('login-admin');
// Route::post('/admin/login', [AdminController::class, 'signin'])->name('login-admin');

// start  midleware admin
Route::group(['middleware' => 'auth.admin'], function () {
    // Rute-rute yang memerlukan autentikasi untuk pengguna admin
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    // pengaduan
    Route::get('/kelola-pengaduan', [PengaduanController::class, 'show'])->name('kelola-pengaduan');
    Route::post('/kelola-pengaduan/update', [PengaduanController::class, 'update'])->name('update.pengaduan.action');
    Route::get('/kelola-pengaduan/{id}', [PengaduanController::class, 'detail'])->name('kelola.pengaduan');
    Route::get('/kelola-pengaduan/detail/{id}', [PengaduanController::class, 'unduh'])->name('detail.pengaduan');
    Route::get('/kelola-pengaduan/update/{id}', [PengaduanController::class, 'updateView'])->name('update.pengaduan');
    // Route::get('/kelola-pengaduan/detail/{id}', [PengaduanController::class, 'unduhPdf'])->name('detail.pengaduan');
    Route::get('/kelola-pengaduan/delete/{id}', [PengaduanController::class, 'delete'])->name('delete-pengaduan');
    // Route::get('/kelola-pengaduan/detail/{id}', [PengaduanController::class, 'unduhPdf'])->name('unduh-pdf');
    Route::get('/kelola-pengaduan/detail/{id}', [PengaduanController::class, 'unduh'])->name('unduh-pdf');
    //   Route::get('/kelola-pengaduan/detail/{id}', [SuratController::class, 'downloadPDF'])->name('unduh-pdf');
    // masyarakat
    Route::get('/kelola-masyarakat', [MasyarakatController::class, 'show'])->name('kelola-masyarakat');
    Route::get('/tambah-masyarakat', [MasyarakatController::class, 'addMasyarakat'])->name('tambah.masyarakat');
    Route::get('/edit-masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakatView'])->name('edit.masyarakat');
    Route::put('/edit-masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakatData'])->name('edit-masyarakat');
    Route::post('/tambah-masyarakat', [MasyarakatController::class, 'addMasyarakat'])->name('tambah-masyarakat');
    Route::delete('/hapus-masyarakat/{id}', [MasyarakatController::class, 'deleteMasyarakat'])->name('hapus.masyarakat');

    // kata kunci
    Route::get('/kelola-kata-kunci', [KatakunciController::class, 'show'])->name('kelola-kata-kunci');
    Route::get('/tambah-kata-kunci', [KatakunciController::class, 'addKatakunci']);
    Route::post('/tambah-kata-kunci', [KatakunciController::class, 'addKatakunci']);
    Route::delete('/hapus-kata-kunci/{id}', [KatakunciController::class, 'deleteKatakunci'])->name('hapus.kata.kunci');
    Route::get('/edit-kata-kunci/{id}', [KatakunciController::class, 'updateKatakunci'])->name('edit.kata.kunci');
    Route::put('/edit-kata-kunci/{id}', [KatakunciController::class, 'updateKatakunciPost'])->name('edit-kata-kunci');

    // kelola admin
});
// end  midleware admin

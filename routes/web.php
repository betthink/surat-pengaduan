<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthPublicController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilPublicController;
use App\Http\Controllers\KatakunciController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanPublicController;
use App\Http\Controllers\RegistrationPublicController;
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
Route::get('/public/registrasi', [AuthPublicController::class, 'show'])->name('public-register');
Route::get('/public/registrasi', [AuthPublicController::class, 'register'])->name('public-register');
Route::post('/public/registrasi', [AuthPublicController::class, 'register'])->name('public-register');

// login
Route::get('/', [AuthPublicController::class, 'show'])->name('public-login');
Route::post('/', [AuthPublicController::class, 'login'])->name('public-login');
Route::get('/public/logout', [AuthPublicController::class, 'logout'])->name('logout');


// admin---
// login 
Route::get('/admin/login', [AuthAdminController::class, 'show'])->name('admin-login');
Route::get('/admin/registrasi', [AuthAdminController::class, 'register'])->name('admin-register');
Route::post('/admin/registrasi', [AuthAdminController::class, 'register'])->name('admin-register');
Route::get('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin-logout');

Route::group(['middleware' => 'auth.public'], function () {
    // Rute-rute yang memerlukan autentikasi untuk pengguna publik
    Route::get('/Beranda', [BerandaController::class, 'show'])->name('Beranda');
    Route::get('/public/hasil', [HasilPublicController::class, 'show'])->name('public-hasil');
    Route::get('/public/pengaduan', [PengaduanPublicController::class, 'show'])->name('public-pengaduan');
    Route::post('/public/pengaduan', [PengaduanPublicController::class, 'submit'])->name('public-pengaduan');
});
// Route::get('/admin/login', [AuthController::class, 'show']);
// Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('login-admin');
Route::post('/admin/login', [AdminController::class, 'signin'])->name('login-admin');
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
Route::group(['middleware' => 'auth.admin'], function () {
    // Rute-rute yang memerlukan autentikasi untuk pengguna admin

    // pengaduan
    Route::get('/kelola-pengaduan', [PengaduanController::class, 'show']);
    // masyarakat
    Route::get('/kelola-masyarakat', [MasyarakatController::class, 'show']);
    Route::get('/tambah-masyarakat', [MasyarakatController::class, 'addMasyarakat']);
    Route::get('/edit-masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakatView'])->name('edit-masyarakat');
    Route::put('/edit-masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakatData'])->name('edit-masyarakat');
    Route::post('/tambah-masyarakat', [MasyarakatController::class, 'addMasyarakat']);
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

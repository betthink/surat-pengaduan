<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthPublicController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatakunciController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationPublicController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// public---
// login

Route::get('/', [AuthPublicController::class, 'show']);
Route::post('/', [AuthPublicController::class, 'login']);
Route::get('/public/logout', [AuthPublicController::class, 'logout'])->name('logout');
Route::get('/Beranda', [BerandaController::class, 'show'])->name('Beranda');
// registration 
Route::get('/registrasi', [RegistrationPublicController::class, 'show']);



// auth
Route::get('/admin/login', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/tambah-admin', [AuthController::class, 'addAdmin']);
Route::post('/tambah-admin', [AuthController::class, 'addAdmin']);


Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
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
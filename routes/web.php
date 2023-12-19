<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatakunciController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PostController;
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
// auth
Route::get('/', [AuthController::class, 'show']);
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
// kelola admin
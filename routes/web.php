<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/daftar', [AuthController::class, 'registerUser']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [UserController::class, 'index']);
Route::get('/users', [UserController::class, 'users'])->name('dashboard')->middleware('auth');
Route::get('/del/{id}', [AuthController::class, 'destroy']);
Route::post('/ubah/{id}', [AuthController::class, 'update']);

Route::resource('/tamu',TamuController::class);
Route::get('/create', [TamuController::class, 'create']);
Route::get('/cetak', [TamuController::class, 'cetak']);
Route::post('/tambah', [TamuController::class, 'store']);
Route::get('/ubah/{id}', [TamuController::class, 'edit']);
Route::post('/update/{id}', [TamuController::class, 'update']);
Route::get('/hapus/{id}', [TamuController::class, 'destroy']);
Route::get('/unduh-Laporan-Data-Tamu-pdf', [TamuController::class, 'unduhpdf']);

Route::resource('/ulasan', UlasanController::class);
Route::get('/bikin', [UlasanController::class, 'create']);
Route::get('/lihat', [UlasanController::class, 'show']);
Route::post('/simpan', [UlasanController::class, 'store']);
Route::get('/ganti/{id}', [UlasanController::class, 'edit']);
Route::post('/updatedata/{id}', [UlasanController::class, 'update']);
Route::get('/apus/{id}', [UlasanController::class, 'destroy']);






<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendaftaranController;
use App\Livewire\Auth\Login;
use App\Livewire\CreatePost;
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


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('/pelatihan')->name('pelatihan.')->group(function () {
    Route::get('/', [PelatihanController::class, 'index'])->name('index');
    Route::get('/{pelatihan}', [PelatihanController::class, 'show'])->name('show');
});

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store')->middleware('auth');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang.kami');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

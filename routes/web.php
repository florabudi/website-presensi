<?php

use App\Http\Controllers\AttendancesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabelRekap; // Tambahkan ini untuk mengimpor controller

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');



// Rute untuk halaman about yang memanggil fungsi di controller TabelRekap
Route::get('/about', [TabelRekap::class, 'index'])->name('about');

// Tambahkan rute ini untuk menambah data kehadiran "Datang"
Route::post('/hadir', [AttendancesController::class, 'datang'])->name('Datang');
 // Untuk mencatat kedatangan
Route::post('/pulang', [AttendancesController::class, 'pulang'])->name('Pulang');

Route::post('/ajukan-izin', [TabelRekap::class, 'ajukanIzin'])->name('ajukanIzin');

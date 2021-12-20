<?php

use App\Http\Controllers\DonDatController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/sanpham');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('sanpham')->name('sanpham.')->group(function () {
    $class = SanPhamController::class;
    Route::get('/', [$class, 'index'])->name('index');
    Route::get('/create', [$class, 'create'])->name('create');
    Route::post('/', [$class, 'store'])->name('store');
    //Route::get('/{sanpham}', [$class, 'show'])->name('show');
    Route::put('/{sanpham}', [$class, 'update'])->name('update');
    Route::delete('/{sanpham}', [$class, 'destroy'])->name('destroy');
    Route::get('/{sanpham}/edit', [$class, 'edit'])->name('edit');
});

Route::prefix('dondat')->name('dondat.')->group(function () {
    $class = DonDatController::class;
    Route::get('/', [$class, 'index'])->name('index');
    Route::get('/create', [$class, 'create'])->name('create');
    Route::post('/', [$class, 'store'])->name('store');
    Route::get('/{dondat}', [$class, 'show'])->name('show');
    Route::put('/{dondat}', [$class, 'update'])->name('update');
    Route::delete('/{dondat}', [$class, 'destroy'])->name('destroy');
    Route::get('/{dondat}/edit', [$class, 'edit'])->name('edit');
    Route::post('/them_chi_tiet_don_dat', [$class, 'them_chi_tiet_don_dat'])->name('them_chi_tiet_don_dat');
    Route::delete('/delete/{id}', [$class, 'delete_chi_tiet_don_dat'])->name('delete_chi_tiet_don_dat');
});

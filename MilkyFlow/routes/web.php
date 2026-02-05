<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PeternakController;

//AUTH
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

//ADMIN
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::get('/peternak', [PeternakController::class, 'index'])
        ->name('peternak');

    Route::post('/peternak/store', [PeternakController::class, 'store'])
        ->name('peternak.store');

    Route::get('/peternak/{id}/edit', [PeternakController::class, 'edit'])
        ->name('peternak.edit');

    Route::put('/peternak/{id}', [PeternakController::class, 'update'])
        ->name('peternak.update');

    Route::delete('/peternak/{id}', [PeternakController::class, 'destroy'])
        ->name('peternak.destroy');

    Route::post('/peternak/toggle-status', [PeternakController::class, 'toggleStatus'])
        ->name('peternak.toggle');

    Route::get('/verifikasi', fn () => view('admin.verifikasi.index'))->name('verifikasi');
    Route::get('/harga', fn () => view('admin.harga.index'))->name('harga');
    Route::get('/rekapitulasi', fn () => view('admin.rekap.index'))->name('rekap');
    Route::get('/laporan', fn () => view('admin.laporan.index'))->name('laporan');
});

//USER

Route::prefix('users')->middleware('auth')->name('users.')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.dashboard.index');
    })->name('dashboard');
});

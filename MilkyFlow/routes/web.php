<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PeternakController;

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

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::get('/peternak', function () {
        return view('admin.peternak.index');
    })->name('admin.peternak');

    Route::get('/verifikasi', function () {
        return view('admin.verifikasi.index');
    })->name('admin.verifikasi');

    Route::get('/harga', function () {
        return view('admin.harga.index');
    })->name('admin.harga');

    Route::get('/rekapitulasi', function () {
        return view('admin.rekap.index');
    })->name('admin.rekap');

    Route::get('/laporan', function () {
        return view('admin.laporan.index');
    })->name('admin.laporan');

});

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/peternak', [PeternakController::class, 'index'])
        ->name('admin.peternak');

    Route::post('/peternak/store', [PeternakController::class, 'store'])
        ->name('admin.peternak.store');

    Route::get('/peternak/search', [PeternakController::class, 'search'])
        ->name('admin.peternak.search');

    Route::get('/peternak/{id}/edit', [PeternakController::class, 'edit'])
        ->name('admin.peternak.edit');

    Route::put('/peternak/{id}', [PeternakController::class, 'update'])
        ->name('admin.peternak.update');

    Route::delete('/peternak/{id}', [PeternakController::class, 'destroy'])
        ->name('admin.peternak.destroy');
});


Route::prefix('users')->group(function () {

    Route::get('/dashboard', function () {
        return view('users.dashboard.index');
    })->name('users.dashboard');

});


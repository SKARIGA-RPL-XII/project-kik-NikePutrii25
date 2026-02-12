<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PeternakController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HargaController;
use App\Http\Controllers\Admin\UserResetController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserSetoranController;
use App\Http\Controllers\User\UserRekapController;

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

    //DATA PETERNAK
    Route::get('/peternak', [PeternakController::class, 'index'])
        ->name('peternak');
    Route::get('/peternak', [PeternakController::class, 'index'])
        ->name('peternak.index');
    Route::post('/peternak/store', [PeternakController::class, 'store'])
        ->name('peternak.store');
    Route::get('/peternak/{id}/edit', [PeternakController::class, 'edit'])
        ->name('peternak.edit');
    Route::put('/peternak/update/{id}', [PeternakController::class, 'update'])
        ->name('peternak.update');
    Route::delete('/admin/peternak/{id}', [PeternakController::class, 'destroy'])
        ->name('admin.peternak.destroy');

    //AKUN PETERNAK
    Route::get('/akun-peternak', [UserController::class, 'index'])
        ->name('akun.index');
    Route::post('/akun-peternak/toggle-status/{id}', [UserController::class, 'toggleStatus'])
        ->name('akun.toggle');
    Route::post('akun-peternak/reset-password/{id}', [UserResetController::class, 'resetPassword'])
        ->name('admin.akun.reset-password');

    //MENU HARGA
    Route::get('/harga-susu', [HargaController::class, 'index'])
        ->name('harga');
    Route::post('/harga-susu', [HargaController::class, 'store'])
        ->name('harga.store');
    Route::put('/harga-susu/{id}', [HargaController::class, 'update'])
        ->name('harga.update');
    Route::delete('/harga-susu/{id}', [HargaController::class, 'destroy'])
        ->name('destroy');

    //MENU VERIFIKASI
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])
        ->name('verifikasi');
    Route::put('/verifikasi/{id}', [VerifikasiController::class, 'verifikasi'])
        ->name('verifikasi.update');

    //MENU LAIN

    Route::get('/rekap', function () {
        return view('admin.rekap.index');
    })->name('rekap');

    Route::get('/laporan', function () {
        return view('admin.laporan.index');
    })->name('laporan');
});

// USER
Route::prefix('users')
    ->middleware(['auth', 'role:users'])
    ->name('users.')
    ->group(function () {

        Route::get('/dashboard', [UserDashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('/setoran', [UserSetoranController::class, 'store'])
            ->name('setoran.store');

        Route::get('/riwayat', [UserSetoranController::class, 'riwayat'])
            ->name('riwayat');

        Route::post('/setoran', [UserSetoranController::class, 'store'])
            ->name('setoran.store');

        Route::put('/setoran/{id_setoran}', [UserSetoranController::class, 'update'])
            ->name('setoran.update');

        Route::get('/rekap', [UserRekapController::class, 'index'])
            ->name('rekap');

        Route::get('/profile', function () {
            return view('users.profile');
        })->name('profile');
    });
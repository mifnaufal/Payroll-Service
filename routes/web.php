<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPengajuanController;

Route::get('/', function () {
    return view('welcome');
});

// Profile hanya untuk user yang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('gaji', GajiController::class);
}); 

Route::prefix('admin')->middleware('RoleMiddleware')->group(function () {
    Route::post('pengajuan/{pengajuan}/update-status', [AdminPengajuanController::class, 'updateStatus'])->name('admin.pengajuan.updateStatus');
});

Route::middleware(['auth', 'RoleMiddleware'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('gaji', App\Http\Controllers\AdminGajiController::class);
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/pengajuan', [AdminPengajuanController::class, 'index'])->name('admin.pengajuan.index');

require __DIR__.'/auth.php';
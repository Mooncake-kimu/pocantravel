<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk tiket
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/history', [TicketController::class, 'history'])->name('tickets.history');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    // Rute untuk bus
    Route::resource('buses', BusController::class);
    Route::get('/{bus}/edit', [BusController::class, 'edit'])->name('buses.edit');
    Route::delete('/{bus}', [BusController::class, 'destroy'])->name('buses.destroy');
});

// Rute untuk autentikasi
require __DIR__.'/auth.php';
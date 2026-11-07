<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

// Route::inertia('/', 'Catalog')->name('home');
Route::get('/', [CatalogController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

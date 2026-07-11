<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;

// 1. Public Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. The Single Smart Dashboard Route (Shared by all roles)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. User Profile Routes (Standard Breeze features)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::resource('users', UserController::class);
});


// for Exports

Route::prefix('export')->group(function () {

    Route::get('/users/excel',[ExportController::class,'usersExcel']);
    Route::get('/users/pdf',[ExportController::class,'usersPDF']);
    Route::get('/users/print',[ExportController::class,'usersPrint']);

    Route::get('/students/excel',[ExportController::class,'studentsExcel']);
    Route::get('/students/pdf',[ExportController::class,'studentsPDF']);
    Route::get('/students/print',[ExportController::class,'studentsPrint']);

});


require __DIR__ . '/auth.php';
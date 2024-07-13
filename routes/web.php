<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanciesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [VacanciesController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('vacancies.index');

Route::get('/vacancies/crear', [VacanciesController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('vacancies.create');

Route::get('/vacancies/{vacancy}/edit', [VacanciesController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->name('vacancies.edit');
        
Route::get('/vacancies/{vacancy}', [VacanciesController::class, 'show'])
        ->name('vacancies.show');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

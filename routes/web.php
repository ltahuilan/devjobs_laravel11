<?php

use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanciesController;
use App\Http\Middleware\VerifyRolUser;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanciesController::class, 'index'])
        ->middleware(['auth', 'verified', 'verify.rol.user'])
        ->name('vacancies.index');

Route::get('/vacancies/create', [VacanciesController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('vacancies.create');

Route::get('/vacancies/{vacancy}/edit', [VacanciesController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->name('vacancies.edit');
        
Route::get('/vacancies/{vacancy}', [VacanciesController::class, 'show'])
        ->name('vacancies.show');

Route::get('/notifications', NotificationsController::class)
        ->middleware(['auth', 'verify.rol.user'] )
        ->name('notifications');

Route::get('/candidates/{vacancy}', [CandidatesController::class, 'index'])
        ->middleware(['auth',] )
        ->name('candidates.index');



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

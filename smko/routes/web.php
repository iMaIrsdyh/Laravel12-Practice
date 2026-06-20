<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'checkrole:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
        Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);
        Route::resource('courses', CourseController::class);
        Route::resource('assignments', AssignmentController::class);
    });

Route::middleware(['auth', 'checkrole:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'guruDashboard'])->name('dashboard');
        Route::resource('courses', CourseController::class);
        Route::resource('assignments', AssignmentController::class);
        Route::resource('submissions', SubmissionController::class)->only(['index', 'show', 'edit', 'update']);
    });

Route::middleware(['auth', 'checkrole:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'siswaDashboard'])->name('dashboard');
        Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
        Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
        Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
        Route::resource('submissions', SubmissionController::class)->only(['index', 'create', 'store']);
    });

require __DIR__.'/auth.php';

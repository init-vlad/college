<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Public routes
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/specialities', [WebController::class, 'specialities'])->name('specialities');
Route::get('/advantages', [WebController::class, 'advantages'])->name('advantages');
Route::get('/grants', [WebController::class, 'grants'])->name('grants');
Route::get('/about', [WebController::class, 'about'])->name('about');

// Guest routes (only for non-authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard routes based on roles
    Route::get('/teacher/dashboard', function () {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Доступ запрещен');
        }
        return view('dashboards.teacher');
    })->name('teacher.dashboard');

    Route::get('/student/dashboard', function () {
        if (auth()->user()->role !== 'student') {
            abort(403, 'Доступ запрещен');
        }
        return view('dashboards.student');
    })->name('student.dashboard');
});

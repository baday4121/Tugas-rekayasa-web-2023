<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; 
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\Auth\AdminAuthController;

// --- Routes Publik ---
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

// --- Routes Otentikasi Admin ---
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// --- Routes Area Admin ---
Route::prefix('admin')->middleware('auth')->group(function () {
    
    // Halaman Dashboard Admin
    Route::get('/', function () {
        return view('admin.home');
    });

    Route::get('/home', function () {
        return view('admin.home');
    });

    Route::get('/users', function () {
        return view('admin.users');
    });

    // CRUD Projects Admin
    Route::get('/projects', [AdminProjectController::class, 'index']);
    Route::get('/projects/create', [AdminProjectController::class, 'create']);
    Route::post('/projects', [AdminProjectController::class, 'store']);
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit']);
    Route::put('/projects/{id}', [AdminProjectController::class, 'update']);
    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy']);
    
    // Export PDF
    Route::get('/projects/pdf', [AdminProjectController::class, 'cetakPdf'])->name('projects.pdf');
});
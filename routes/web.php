<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; 
use App\Http\Controllers\AdminProjectController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/admin/home', function () {
    return view('admin.home');
});

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/admin/projects', [AdminProjectController::class, 'index']);
Route::get('/admin/projects/create', [AdminProjectController::class, 'create']);
Route::post('/admin/projects', [AdminProjectController::class, 'store']);
Route::get('/admin/projects/{id}/edit', [AdminProjectController::class, 'edit']);
Route::put('/admin/projects/{id}', [AdminProjectController::class, 'update']);
Route::delete('/admin/projects/{id}', [AdminProjectController::class, 'destroy']);
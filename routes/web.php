<?php

use Illuminate\Support\Facades\Route;

// Route untuk Halaman Home
Route::get('/', function () {
    return view('pages.home');
});

// Route untuk Halaman Profile
Route::get('/profile', function () {
    return view('pages.profile');
});

// Route untuk Halaman About
Route::get('/about', function () {
    return view('pages.about');
});
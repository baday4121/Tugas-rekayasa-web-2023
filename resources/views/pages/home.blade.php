@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="fw-bold text-dark mb-3">Selamat Datang di Portofolio Saya</h1>
                <p class="text-secondary lead mb-4" style="font-size: 1.05rem; line-height: 1.7;">
                    Halo! Saya <strong class="text-dark">Ari Gunawan</strong>. Website ini dibangun menggunakan Laravel untuk menampilkan profil, daftar proyek pengembangan sistem, serta rekam jejak profesional saya.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/projects') }}" class="btn btn-primary px-4 py-2 rounded-3 fw-bold">Lihat Proyek</a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-bold">Tentang Saya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
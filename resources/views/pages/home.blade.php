@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                {{-- Foto Profil --}}
                <div class="mb-4 d-flex justify-content-center">
                    <img alt="Ari Gunawan" 
                         src="{{ asset('images/about/arigunawan.jfif') }}" 
                         class="shadow profile-img" 
                         style="width: 150px; height: 190px; object-fit: cover; object-position: center top; border-radius: 75px / 95px; border: 4px solid #fff;">
                </div>

                {{-- Nama & Profesi --}}
                <h1 class="fw-bold text-dark mb-2">Ari Gunawan</h1>
                <h5 class="text-primary fw-semibold mb-4">IT Professional & Web Developer</h5>

                {{-- Deskripsi Singkat --}}
                <p class="text-secondary lead mb-4" style="font-size: 1.05rem; line-height: 1.7;">
                    Selamat datang di halaman utama portofolio saya. Website ini dibangun menggunakan Laravel untuk menampilkan profil, daftar proyek pengembangan sistem, serta rekam jejak profesional saya.
                </p>

                {{-- Tombol Navigasi Aksi --}}
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/projects') }}" class="btn btn-primary px-4 py-2 rounded-3 fw-bold">Lihat Proyek</a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-bold">Tentang Saya</a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .profile-img {
        width: 140px;
        height: 180px;
    }

    @media (min-width: 768px) {
        .profile-img {
            width: 160px;
            height: 205px;
        }
    }
</style>
@endsection
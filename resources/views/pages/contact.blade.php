@extends('layouts.main')

@section('title', 'Contact')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                
                <div class="text-center mb-5">
                    <h1 class="fw-bold text-dark mb-3">Hubungi Saya</h1>
                    <p class="text-secondary" style="font-size: 0.95rem; max-width: 600px; margin: 0 auto;">
                        Silakan hubungi saya melalui form di bawah ini atau kirimkan pesan jika ada pertanyaan, kolaborasi, atau proyek yang ingin didiskusikan.
                    </p>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-3 py-2" id="name" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium text-dark">Alamat Email</label>
                        <input type="email" class="form-control rounded-3 py-2" id="email" placeholder="nama@domain.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label fw-medium text-dark">Pesan</label>
                        <textarea class="form-control rounded-3 py-2" id="message" rows="5" placeholder="Tuliskan pesan atau keperluan Anda di sini..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2 rounded-3 fw-bold">Kirim Pesan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
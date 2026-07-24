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
                        Silakan hubungi saya melalui informasi di bawah ini atau kirimkan pesan jika ada pertanyaan, kolaborasi, atau proyek yang ingin didiskusikan.
                    </p>
                </div>

                <div class="row g-3 mb-5">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 h-100 bg-light d-flex align-items-center">
                            <div class="text-primary fs-4 me-3">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <a href="mailto:baday4121@gmail.com" class="text-dark fw-semibold text-decoration-none">baday4121@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 h-100 bg-light d-flex align-items-center">
                            <div class="text-success fs-4 me-3">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">WhatsApp</small>
                                <a href="https://wa.me/6283805445843" target="_blank" class="text-dark fw-semibold text-decoration-none">+62 838-0544-5843</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="p-3 border rounded-3 h-100 bg-light d-flex align-items-center">
                            <div class="text-danger fs-4 me-3">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Alamat</small>
                                <span class="text-dark fw-semibold">Bekasi, Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="p-3 border rounded-3 bg-light text-center">
                            <small class="text-muted d-block mb-2">Tautan Media Sosial</small>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://www.linkedin.com/in/gunawan4121/" target="_blank" class="btn btn-outline-primary btn-sm px-3 rounded-pill">LinkedIn</a>
                                <a href="https://github.com/baday4121/" target="_blank" class="btn btn-outline-dark btn-sm px-3 rounded-pill">GitHub</a>
                                <a href="https://instagram.com/baday_xml" target="_blank" class="btn btn-outline-danger btn-sm px-3 rounded-pill">Instagram</a>
                            </div>
                        </div>
                    </div>
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
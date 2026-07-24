@extends('layouts.main')

@section('title', 'About')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">

        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark mb-4">Tentang Saya</h1>
            
            <div class="mb-4 d-flex justify-content-center">
                <img alt="Ari Gunawan" 
                     src="{{ asset('images/about/arigunawan.jfif') }}" 
                     class="shadow profile-img" 
                     style="width: 180px; height: 230px; object-fit: cover; object-position: center top; border-radius: 90px / 110px; border: 4px solid #fff;">
            </div>
            
            <h2 class="fw-bold text-dark mb-3" style="color: #2c3e50 !important;">Ari Gunawan</h2>
            
            <p class="text-secondary mx-auto lh-lg" style="max-width: 900px; font-size: 0.95rem;">
                Di luar pekerjaan, saya menikmati mengeksplorasi teknologi terbaru, berpartisipasi dalam komunitas teknologi, dan berbagi pengetahuan melalui blog dan forum. Saya percaya bahwa belajar dan berkembang adalah proses yang tidak pernah berhenti, dan saya selalu mencari kesempatan untuk meningkatkan keterampilan dan pengetahuan saya.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="mb-5 mt-4">
                    <h4 class="fw-bold mb-4 text-primary">
                        Pengalaman
                    </h4>

                    <div class="custom-timeline">
                        <article class="timeline-item">
                            <h6 class="fw-bold text-dark mb-1" style="color: #2c3e50 !important;">IT Support - PT Nafeeza Radhya Bogatama</h6>
                            <span class="text-muted small d-block mb-3">Nov 2022 - Saat ini</span>
                            <ul class="text-secondary custom-list">
                                <li>Mengidentifikasi, mendiagnosis, dan menyelesaikan masalah hardware, software, dan network issues.</li>
                                <li>Memberikan pelatihan kepada pengguna mengenai perangkat keras, perangkat lunak, dan aplikasi.</li>
                                <li>Memastikan performa jaringan berfungsi dengan baik dan mengatasi gangguan yang terjadi.</li>
                                <li>Melakukan pemeliharaan rutin pada komputer, server, jaringan, dan perangkat lainnya.</li>
                                <li>Menginstal, mengonfigurasi, dan memperbarui perangkat keras dan perangkat lunak.</li>
                                <li>Mendukung proyek TI, termasuk implementasi perangkat lunak baru, pemasangan dan konfigurasi server, CCTV, dan jaringan.</li>
                                <li>Melaporkan insiden teknis dan langkah-langkah yang diambil untuk mengatasinya.</li>
                                <li>Mengelola inventaris aset IT perusahaan.</li>
                            </ul>
                        </article>

                        <article class="timeline-item">
                            <h6 class="fw-bold text-dark mb-1" style="color: #2c3e50 !important;">Teknisi Maintenance - PT Satria Cipta Karya</h6>
                            <span class="text-muted small d-block mb-3">Mei 2022 - Sep 2022</span>
                            <ul class="text-secondary custom-list">
                                <li>Pemeliharaan rutin dan perbaikan pada peralatan dan fasilitas perusahaan.</li>
                                <li>Mendiagnosis dan menyelesaikan masalah teknis pada mesin dan peralatan.</li>
                                <li>Bekerja sama dengan tim untuk perbaikan dan peningkatan fasilitas.</li>
                                <li>Melaporkan dan mencatat semua pekerjaan pemeliharaan yang telah dilakukan.</li>
                            </ul>
                        </article>
                    </div>
                </div>

                <div>
                    <h4 class="fw-bold mb-4 text-primary">
                        Pendidikan
                    </h4>

                    <div class="custom-timeline">
                        <article class="timeline-item">
                            <h6 class="fw-bold text-dark mb-1" style="color: #2c3e50 !important;">Universitas Pamulang - Sistem Informasi</h6>
                            <span class="text-muted small d-block mb-2">2022 - Saat ini</span>
                            <p class="text-secondary" style="font-size: 0.95rem; line-height: 1.6;">
                                Saya sedang menempuh pendidikan di Universitas Pamulang, jurusan Sistem Informasi, di mana saya mempelajari berbagai aspek teknologi informasi, termasuk pengembangan sistem, manajemen database, jaringan, dan keamanan informasi. Ini telah membantu saya mengembangkan keterampilan analitis dan teknis, serta pemahaman yang mendalam tentang bagaimana teknologi dapat diimplementasikan untuk memecahkan masalah bisnis.
                            </p>
                        </article>

                        <article class="timeline-item">
                            <h6 class="fw-bold text-dark mb-1" style="color: #2c3e50 !important;">SMAN 1 Tambelang - Ilmu Pengetahuan Alam</h6>
                            <span class="text-muted small d-block mb-2">2019 - 2022</span>
                            <p class="text-secondary" style="font-size: 0.95rem; line-height: 1.6;">
                                Di SMA, saya belajar mengasah logika dan pola berpikir terstruktur, yang hingga kini sangat bermanfaat dalam kehidupan sehari-hari.
                            </p>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .profile-img {
        width: 160px;
        height: 210px;
    }

    @media (min-width: 768px) {
        .profile-img {
            width: 190px;
            height: 250px;
        }
    }

    .custom-timeline {
        border-left: 2px solid #e9ecef; 
        padding-left: 2rem;
        margin-left: 14px;
        margin-bottom: 2rem;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 2.5rem;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -2.35rem;
        top: 0.2rem;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: #0d6efd;
        border: 2px solid #fff;
        box-shadow: 0 0 0 3px #f1f5f9;
    }

    .custom-list {
        padding-left: 1.2rem;
        font-size: 0.95rem;
    }
    
    .custom-list li {
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
</style>
@endsection
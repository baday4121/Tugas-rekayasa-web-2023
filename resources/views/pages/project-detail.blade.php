@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <div class="mb-4">
                <a href="{{ url('/projects') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm transition-hover">
                    &larr; Kembali ke Daftar Project
                </a>
            </div>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                @php
                    $imagePath = 'images/projects/' . $project->image;
                    $defaultImage = 'images/projects/pos-project1.webp';
                @endphp

                @if($project->image && file_exists(public_path($imagePath)))
                    <img src="{{ asset($imagePath) }}" class="card-img-top w-100" alt="{{ $project->title }}" style="max-height: 450px; object-fit: cover;">
                @else
                    <img src="{{ asset($defaultImage) }}" class="card-img-top w-100" alt="Default Image" style="max-height: 450px; object-fit: cover;">
                @endif

                <div class="card-body p-4 p-md-5">
                    {{-- Header Title & Status --}}
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                        <h2 class="card-title fw-bold text-dark mb-3 mb-md-0">{{ $project->title }}</h2>
                        <span class="badge rounded-pill bg-{{ $project->status == 'Completed' ? 'success' : 'warning' }} px-4 py-2 fs-6 shadow-sm">
                            {{ $project->status }}
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-3" style="letter-spacing: 1px; font-size: 0.85rem;">Teknologi yang Digunakan</h6>
                        <div>
                            @foreach(explode(',', $project->technology) as $tech)
                                <span class="badge bg-light text-primary border border-primary px-3 py-2 me-2 mb-2 rounded-pill fw-normal shadow-sm">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    
                    <hr class="text-muted opacity-25 my-4">
                    
                    <h5 class="fw-bold text-dark mb-3">Deskripsi Project</h5>
                    <p class="card-text text-secondary lh-lg" style="white-space: pre-line; font-size: 1.05rem;">
                        {{ $project->description }}
                    </p>
                </div>
                
                <div class="card-footer bg-light p-4 text-center border-0">
                    <small class="text-muted fw-medium">
                        Diunggah pada: {{ $project->created_at->format('d F Y') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .transition-hover {
        transition: all 0.3s ease-in-out;
    }
    .transition-hover:hover {
        transform: translateX(-5px);
        background-color: #0d6efd;
        color: #fff;
    }
</style>
@endsection
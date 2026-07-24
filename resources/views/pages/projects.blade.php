@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    
    {{-- Header Section --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-dark">My Projects</h1>
        <p class="text-muted">Berikut adalah beberapa project yang sedang dan telah saya kembangkan.</p>
    </div>

    <div class="row g-4">
        @foreach($projects as $project)
            {{-- col-lg-4 = 3 kolom di PC, col-md-6 = 2 kolom di Tablet, col-12 = 1 kolom di HP --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card h-100 border-0 shadow-sm rounded-4 project-card overflow-hidden">
                    
                    @php
                        $imagePath = 'images/projects/' . $project->image;
                        $defaultImage = 'images/projects/default-images.avif';
                    @endphp

                    <div class="overflow-hidden">
                        @if($project->image && file_exists(public_path($imagePath)))
                            <img src="{{ asset($imagePath) }}" class="card-img-top project-image w-100" alt="{{ $project->title }}">
                        @else
                            <img src="{{ asset($defaultImage) }}" class="card-img-top project-image w-100" alt="Default Image">
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold text-dark mb-3">{{ $project->title }}</h5>

                        <div class="mb-3">
                            @foreach(array_slice(explode(',', $project->technology), 0, 2) as $tech)
                                <span class="badge bg-light text-primary border border-primary-subtle rounded-pill fw-normal me-1 mb-1 shadow-sm">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                            @if(count(explode(',', $project->technology)) > 2)
                                <span class="badge bg-light text-muted border rounded-pill fw-normal mb-1">...</span>
                            @endif
                        </div>

                        <p class="card-text text-secondary flex-grow-1" style="font-size: 0.95rem;">
                            {{ \Illuminate\Support\Str::limit($project->description, 90) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                            <span class="badge rounded-pill bg-{{ $project->status == 'Completed' ? 'success' : 'warning' }} px-3 py-2">
                                {{ $project->status }}
                            </span>
                            <a href="{{ url('/projects/' . $project->id) }}" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm transition-hover">
                                Detail &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $projects->links() }}
    </div>
</div>

<style>
    .project-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15)!important;
    }
    .project-image {
        height: 220px; 
        object-fit: cover; 
        transition: transform 0.5s ease;
    }

    .project-card:hover .project-image {
        transform: scale(1.05);
    }
    .transition-hover {
        transition: all 0.2s ease-in-out;
    }
    .transition-hover:hover {
        background-color: #0b5ed7;
        transform: translateX(3px);
    }
</style>
@endsection
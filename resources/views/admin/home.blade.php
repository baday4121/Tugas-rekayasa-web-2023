@extends('admin.template')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark mb-1" style="font-size: 1.75rem;">Admin Dashboard</h2>
    <p class="text-muted mb-0" style="font-size: 0.95rem;">
        Selamat datang kembali di panel Admin web portofolio.
    </p>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-primary border-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem;">Total Project</h6>
                    <h3 class="fw-bold text-dark mb-0">{{ \App\Models\Project::count() }}</h3>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                        <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 pt-2 border-top">
                <a href="{{ url('/admin/projects') }}" class="text-decoration-none text-primary fw-medium" style="font-size: 0.85rem;">
                    Kelola Project &rarr;
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
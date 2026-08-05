@extends('admin.template')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <h2 class="fw-normal text-dark mb-0" style="font-size: 1.75rem;">Data Projects</h2>
    <div class="d-flex gap-2">
        <a href="{{ url('/admin/projects/create') }}" class="btn btn-primary btn-sm px-3 py-2 fw-medium">Tambah Project</a>
        <a href="{{ route('projects.pdf') }}" class="btn btn-danger btn-sm px-3 py-2 fw-medium" target="_blank">Cetak PDF</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
    <div class="d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <div>{{ session('success') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-3">
        <form method="GET" action="{{ url('/admin/projects') }}" class="d-flex align-items-center gap-2">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <label for="per_page" class="text-secondary small">Tampilkan:</label>
            <select name="per_page" id="per_page" class="form-select form-select-sm" style="width: 80px;" onchange="this.form.submit()">
                @foreach([10, 25, 50, 100] as $limit)
                    <option value="{{ $limit }}" {{ request('per_page', 10) == $limit ? 'selected' : '' }}>{{ $limit }}</option>
                @endforeach
            </select>
            <span class="text-secondary small">data</span>
        </form>

        <form method="GET" action="{{ url('/admin/projects') }}" class="d-flex align-items-center gap-2 w-100" style="max-width: 300px;">
            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            <div class="input-group input-group-sm w-100">
                <input type="text" name="search" class="form-control" placeholder="Cari project..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
                @if(request('search'))
                    <a href="{{ url('/admin/projects') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0" style="font-size: 0.9rem;">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th style="width: 12%;">Image</th>
                    <th style="width: 15%;">Title</th>
                    <th style="width: 15%;">Teknologi</th>
                    <th style="width: 33%;">Description</th>
                    <th class="text-center" style="width: 8%;">Status</th>
                    <th class="text-center" style="width: 12%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $index => $project)
                <tr>
                    <td class="text-center">
                        {{ ($projects->currentPage() - 1) * $projects->perPage() + $index + 1 }}
                    </td>
                    <td>
                        @if($project->image && file_exists(public_path('images/projects/' . $project->image)))
                            <img src="{{ asset('images/projects/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail rounded" style="width: 70px; height: 50px; object-fit: cover;">
                        @else
                            <div class="bg-light border text-center py-2 px-1 rounded text-muted small" style="width: 70px; height: 50px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem;">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td class="fw-medium">{{ $project->title }}</td>
                    <td>{{ $project->technology }}</td>
                    <td>{{ Str::limit($project->description, 80) }}</td>
                    <td class="text-center">
                        <span>{{ $project->status }}</span>
                    </td>
                    <td class="text-center">
                        <a href="{{ url('/admin/projects/' . $project->id . '/edit') }}" class="btn btn-warning btn-sm text-dark px-2 py-1 mb-1 me-1" style="font-size: 0.8rem;">Edit</a>
                        
                        <form action="{{ url('/admin/projects/' . $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm px-2 py-1 mb-1" style="font-size: 0.8rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Data project tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 gap-3">
        <div class="text-muted small">
            Menampilkan {{ $projects->firstItem() ?? 0 }} sampai {{ $projects->lastItem() ?? 0 }} dari {{ $projects->total() }} data
        </div>
        <div>
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
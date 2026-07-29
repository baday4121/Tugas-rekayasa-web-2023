@extends('admin.template')

@section('content')
<div class="mb-4">
    <h2 class="fw-normal text-dark mb-0" style="font-size: 1.75rem;">Edit Project</h2>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <form action="{{ url('/admin/projects/' . $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="title" class="form-label fw-medium text-dark">Nama Project</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="technology" class="form-label fw-medium text-dark">Teknologi</label>
                <input type="text" class="form-control @error('technology') is-invalid @enderror" id="technology" name="technology" value="{{ old('technology', $project->technology) }}" required>
                @error('technology')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="status" class="form-label fw-medium text-dark">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="" disabled>Pilih Status</option>
                    <option value="In Development" {{ old('status', $project->status) == 'In Development' ? 'selected' : '' }}>In Development</option>
                    <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label fw-medium text-dark">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                <div class="form-text text-muted" style="font-size: 0.8rem;">Biarkan kosong jika tidak ingin mengubah gambar. (Maks. 2MB)</div>
                
                @if($project->image && file_exists(public_path('images/projects/' .$project->image)))
                    <div class="mt-2 d-flex align-items-center gap-2">
                        <img src="{{ asset('images/projects/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail rounded" style="width: 60px; height: 45px; object-fit: cover;">
                        <small class="text-muted">File saat ini: {{ $project->image }}</small>
                    </div>
                @elseif($project->image)
                    <small class="text-muted mt-1 d-block">File saat ini: {{ $project->image }}</small>
                @endif

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label fw-medium text-dark">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Ubah</button>
            <a href="{{ url('/admin/projects') }}" class="btn btn-danger px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
@extends('admin.layout.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Categories</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Category</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('category.index') }}" class="btn btn-light">
            <i class="bx bx-arrow-back"></i> Back to Categories
        </a>
    </div>
</div>
<!--end breadcrumb-->

<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body">
        <div class="card-title d-flex align-items-center mb-4">
            <div><i class="bx bxs-folder-plus me-1 font-22 text-primary"></i></div>
            <h5 class="mb-0 text-primary">Tambah Data Category</h5>
        </div>
        <hr>

        <!-- form -->
        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Category Name -->
                <div class="mb-3 col-lg-6">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Masukkan Nama Kategori"
                           value="{{ old('name') }}" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3 col-lg-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                           id="slug" name="slug" placeholder="Contoh: nama-kategori"
                           value="{{ old('slug') }}" required />
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="col-lg-12 mt-4">
                <button type="submit" class="btn btn-primary px-5">
                    <i class="bx bx-save me-1"></i> Create Category
                </button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary ms-2">
                    <i class="bx bx-x-circle me-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for auto-generating slug from name -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            // Simple slug generation
            let slug = this.value.toLowerCase()
                .replace(/[^\w\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-')     // Replace spaces with hyphens
                .replace(/-+/g, '-');     // Replace multiple hyphens with single hyphen

            slugInput.value = slug;
        });
    }
});
</script>
@endsection

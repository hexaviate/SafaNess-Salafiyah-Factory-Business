@extends('admin.layout.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Sub Categories</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('subCategory.index') }}">Sub Category Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Sub Category</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('subCategory.index') }}" class="btn btn-light">
            <i class="bx bx-arrow-back"></i> Back to Sub Categories
        </a>
    </div>
</div>
<!--end breadcrumb-->

<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body">
        <div class="card-title d-flex align-items-center mb-4">
            <div><i class="bx bxs-folder-plus me-1 font-22 text-primary"></i></div>
            <h5 class="mb-0 text-primary">Add New Sub Category</h5>
        </div>
        <hr>

        {{-- form --}}
        <form action="{{ route('subCategory.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Parent Category -->
                <div class="mb-3 col-lg-6">
                    <label for="category_id" class="form-label">Parent Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="" selected disabled>-- Select Parent Category --</option>
                        @foreach ($data as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sub Category Name -->
                <div class="mb-3 col-lg-6">
                    <label for="name" class="form-label">Sub Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Sub Category Name" value="{{ old('name') }}" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3 col-lg-12">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                           id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}" readonly />
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Slug akan dibuat otomatis dari nama.</small>
                </div>
            </div>

            <!-- Buttons -->
            <div class="col-lg-12 mt-4">
                <button type="submit" class="btn btn-primary px-5">
                    <i class="bx bx-save me-1"></i> Create Sub Category
                </button>
                <a href="{{ route('subCategory.index') }}" class="btn btn-secondary ms-2">
                    <i class="bx bx-x-circle me-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for auto-generating slug from name -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            slugInput.value = slug;
        });
    }
});
</script>
@endsection

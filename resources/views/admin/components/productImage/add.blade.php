@extends('admin.layout.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Product Image</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('productImage.index') }}">Product Image Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Product Image</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-image me-1 font-22 text-primary"></i></div>
            <h5 class="mb-0 text-primary">Add New Product Image</h5>
        </div>
        <hr>

        {{-- form --}}
        <form action="{{ route('productImage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Product:</label>
                <select class="form-control" name="product_id" required>
                    <option value="" selected disabled>-- Select Product --</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input id="image" type="file" name="image" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary px-5">Create</button>
                <a href="{{ route('productImage.index') }}" class="btn btn-secondary px-5 ms-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

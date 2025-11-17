@extends('admin.layout.app')
@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">eCommerce</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                {{-- Perbaikan: Menambahkan rute yang benar --}}
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products Details</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-danger" href="{{ route('product.index')}}">Back</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="card">
    {{-- Variabel dan foreach DIPERTAHANKAN sesuai permintaan --}}
    @foreach ($data as $item )
    <div class="row g-0">
        <div class="col-md-4 border-end">
            {{-- Perbaikan: Menambahkan helper asset() untuk path gambar --}}
            <img src="{{ asset('images/'.$item->product_img) }}" class="img-fluid" alt="...">
            <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                {{-- Perbaikan: Menambahkan helper asset() untuk path gambar --}}
                <div class="col"><img src="{{ asset('assets/images/products/12.png') }}" width="70"
                        class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="{{ asset('assets/images/products/11.png') }}" width="70"
                        class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="{{ asset('assets/images/products/14.png') }}" width="70"
                        class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="{{ asset('assets/images/products/15.png') }}" width="70"
                        class="border rounded cursor-pointer" alt=""></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">

                {{-- Perbaikan: Memperbaiki syntax penutup kurung kurawal --}}
                <h4 class="card-title">{{ $item->name }}</h4>

                <div class="mb-3">
                    {{-- Perbaikan: Memperbaiki syntax dan menambahkan format harga --}}
                    <span class="price h4">Rp. {{ number_format($item->price, 2, ',', '.') }}</span>
                </div>
                <dl class="row">
                    <dt class="col-sm-3">Category</dt>
                    <dd class="col-sm-9">{{ $item->sub_category->name }}</dd>

                    <dt class="col-sm-3">Stock</dt>
                    <dd class="col-sm-9">{{ $item->stock }}</dd>

                    <dt class="col-sm-3">Slug</dt>
                    <dd class="col-sm-9">{{ $item->slug }}</dd>
                </dl>

                <hr>
                <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <div class="input-group input-spinner">
                            <button class="btn btn-white" type="button" id="button-plus"> + </button>
                            <input type="text" class="form-control" value="1">
                            <button class="btn btn-white" type="button" id="button-minus"> − </button>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label">Select Color</label>
                        {{-- Perbaikan: Memperbaiki typo nama kelas CSS --}}
                        <div class="color-indicators d-flex align-items-center gap-2">
                            <div class="color-indicator-item bg-primary"></div>
                            <div class="color-indicator-item bg-danger"></div>
                            <div class="color-indicator-item bg-success"></div>
                            <div class="color-indicator-item bg-warning"></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="btn btn-primary">Buy Now</a>
                    <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i
                            class='bx bxs-cart-alt'></i></a>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                        </div>
                        <div class="tab-title"> Product Description </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content pt-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                {{-- Perbaikan: Memperbaiki syntax dan menggunakan {!! !!} untuk render HTML --}}
                <p>{!! $item->description !!}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

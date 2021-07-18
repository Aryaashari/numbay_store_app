@extends('layouts.frontend')

@section('navbar')
    <x-navbar-frontend></x-navbar-frontend>
@endsection

@section('content')

    <!-- Start Banner Area -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <h2>Lokal</h2>
                    <h4>Pertama di Jayapura</h4>
                </div>
                <div class="col-xl-6 col-12">
                    <img src="{{ asset('frontend/img/banner.png') }}" alt="banner">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->


    <!-- Start Produk Area -->
    <div class="produk">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <h2 class="title">Produk</h2>
                    <p class="subtitle">Kami menyediakan produk-produk berkualitas dari para UMKM lokal.</p>
                    <div class="garis"></div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4">
                    <form action="{{ url('/') }}" class="form-search" method="GET">
                        <div class="search-box d-flex">
                            <button type="submit"><img src="{{ asset('frontend/img/icon/search.png') }}" class="search-icon" alt="search-icon"></button> 
                            <input type="search" name="search" placeholder="Cari produk atau toko" autocomplete="off">
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="container-fluid">
                <div class="row card-produk">
                    

                    @foreach ($products as $product)
                        <div class="col-lg-3 col-6 col-md-4 mb-3 mb-md-5 d-flex justify-content-center">
                            <a href="{{ url('/detail/product/'.$product->slug) }}">
                                <div class="card">
                                    <div class="img" style="background-image: url({{ asset('storage/uploads/product/'.$product->foto_produk) }});"></div>
                                    <div class="text-produk">
                                        <a href="{{ url('/detail/product/'.$product->slug) }}"><h4>{{ Str::limit($product->nama_produk, 20, '...') }}</h4></a>
                                        <p>{{ $product->store->nama_toko }}</p>
                                        <h3>Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach



                </div>
            </div>
            <div class="row pagination-card">
                <div class="col">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Area -->

@endsection

@if (session('productKosong'))
    @push('js')
        <script>
            swal({
                text: 'Kata kunci '+ '<?php echo session('productKosong'); ?>' +' tidak ditemukan!',
                icon: 'error'
            }).then((_) => {
                location.reload();
            })
        </script>
    @endpush
@endif
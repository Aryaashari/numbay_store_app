@extends('layouts.frontend')

@section('title', 'Numbay Store - Profile Toko')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profil-toko.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush


@section('navbar')
    <div class="fixed-top">
        <x-navbar-frontend2></x-navbar-frontend2>
    </div>
@endsection


@section('id', 'profil-toko')
@section('content')
<!-- Spacing to Navbar -->
<div style="height: 75px;"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card detail-toko">
                <div class="img-toko" style="background-image: url({{ asset('frontend/img/icon/'.$stores->foto_profile_toko) }});"></div>
                <h4>{{ $stores->nama_toko }}</h4>
                
                <h5>{{ implode(', ',$categoryStores) }}</h5>

                <p class="alamat">{{ $stores->alamat_toko }}</p>
                <div class="garis"></div>
                <p class="desc">{{ $stores->deskripsi_toko }}</p>
                <div class="sosial-media d-flex justify-content-center align-items-center">
                    <a href="https://wa.me/62{{ substr($stores->no_telp_toko,1,15) }}" target="_blank" class="wa mr-4"><img src="{{ asset('frontend/img/icon/wa.png') }}" alt="whatsapp"></a>
                    {{-- <a href="#" target="_blank" class="fb mr-4"><img src="{{ asset('frontend/img/icon/facebook.png') }}" alt="facebook"></a> --}}
                    <a href="https://www.instagram.com/{{ $stores->akun_instagram }}" target="_blank" class="ig"><img src="{{ asset('frontend/img/icon/ig.png') }}" alt="instagram"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 semua-produk">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2>Semua Produk</h2>
                    </div>
                </div>
                <div class="row card-produk">
                    
                    @foreach ($stores->products as $product)
                        <div class="col-md-4 col-6">
                            <a href="{{ url('/detail/product/'.$product->slug) }}">
                                <div class="card">
                                    <div class="img" style="background-image: url({{ asset('storage/uploads/product/'.$product->foto_produk) }});"></div>
                                    <div class="text-produk">
                                        <a href="{{ url('/detail/product/'.$product->slug) }}"><h4>{{ Str::limit($product->nama_produk, 20, '...') }}</h4></a>
                                        <h3 class="mt-2">Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
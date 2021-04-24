@extends('layouts.frontend')

@section('title', 'Numbay Store - Wishlists')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/wishlist.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush


@section('navbar')
    <x-navbar-frontend></x-navbar-frontend>
@endsection


@section('id', 'wishlist')
@section('content')
    <!-- Start Produk Area -->
    <div class="produk">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title">Wishlists</h1>
                    <div class="garis mx-auto"></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row card-produk">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-6 col-md-4 mb-3 mb-md-5 d-flex justify-content-center">
                            <a href="{{ url('detail/product/'.$product->slug) }}">
                                <div class="card">
                                    <div class="img" style="background-image: url({{ asset('frontend/img/produk/'.$product->foto_produk) }});"></div>
                                    <div class="text-produk">
                                        <a href="{{ url('detail/product/'.$product->slug) }}"><h4>{{ Str::limit($product->nama_produk, 20, '...') }}</h4></a>
                                        <p>{{ $product->store->nama_toko }}</p>
                                        <h3>Rp {{ $product->harga_produk }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Area -->
@endsection
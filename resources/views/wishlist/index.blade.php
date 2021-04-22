@extends('layouts.frontend')

@section('title', 'Numbay Store - Wishlist')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/wishlist.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush


@section('navbar')
    <x-navbar-frontend2></x-navbar-frontend2>
@endsection


@section('id', 'wishlist')
@section('content')
    <!-- Start Produk Area -->
    <div class="produk">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title">Wishlist</h1>
                    <div class="garis mx-auto"></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row card-produk">
                    <div class="col-lg-3 col-6 col-md-4 mb-3 mb-md-5 d-flex justify-content-center">
                        <a href="detail-produk.html">
                            <div class="card">
                                <div class="img" style="background-image: url({{ asset('frontend/img/produk/somay.png') }});"></div>
                                <div class="text-produk">
                                    <a href="detail-produk.html"><h4>Siomay</h4></a>
                                    <p>Nama Toko</p>
                                    <h3>Rp 5.000</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Area -->
@endsection
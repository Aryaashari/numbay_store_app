@extends('layouts.frontend')

@section('title', 'Numbay Store - Profile Toko')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profil-toko.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush


@section('navbar')
    <div class="fixed-top">
        <x-navbar-frontend></x-navbar-frontend>
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
                <div class="img-toko" style="background-image: url({{ asset('frontend/img/produk/kangkung.png') }});"></div>
                <h4>Nama Toko</h4>
                <h5>Produk makanan/minuman</h5>
                <p class="alamat">Sentani</p>
                <div class="garis"></div>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo ultrices ipsum donec diam</p>
                <div class="sosial-media d-flex justify-content-center">
                    <a href="#" class="wa mr-4"><img src="{{ asset('frontend/img/icon/wa.png') }}" alt="whatsapp"></a>
                    <a href="#" class="ig"><img src="{{ asset('frontend/img/icon/ig.png') }}" alt="instagram"></a>
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
                    <div class="col-md-4 col-6">
                        <a href="detail-produk.html">
                            <div class="card">
                                <div class="img" style="background-image: url({{ asset('frontend/img/produk/somay.png') }});"></div>
                                <div class="text-produk">
                                    <a href="detail-produk.html"><h4>Siomay sfdsf sadasdsada</h4></a>
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
</div>
@endsection
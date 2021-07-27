@extends('layouts.frontend')

@section('title', 'Numbay Store - Tentang Kami')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/tentang.css') }}">
@endpush

@push('js')
    
@endpush


@section('navbar')
    <x-navbar-frontend></x-navbar-frontend>
@endsection


@section('id', 'tentang')
@section('content')
    
    <div class="container">

        <!-- Start About Area -->
        <div class="row bio">
            <div class="col-12 col-lg-7 col-xl-6">
                <img src="{{ asset('frontend/img/tentang.png') }}" alt="numbaystore">
            </div>
            <div class="col-12 col-lg-5 col-xl-6 text">
                <h3 class="judul">Mengenal Numbay Store</h3>
                <p class="deskripsi">Numbay Store merupakan platform penjualan produk lokal Jayapura. Kami bertujuan memberdayakan dan memajukan para UMKM, petani, & nelayan lokal. serta turut memajukan perekonomian kota jayapura & sekitarnya.</p>
            </div>
        </div>
        <!-- End About Area -->

    </div>


    <div class="container-fluid">

        <!-- Start Quote Area  -->
        <div class="row quote">
            <div class="col-12 col-md-7 col-lg-5 col-xl-4 text-center">
                <h4 class="judul">Kami percaya kepada para UMKM</h4>
                <p class="text">Kami Percaya bahwa UMKM yang maju & berdaya akan memberi andil bagi tingkat kesejahteraan masyarakat Jayapura</p>
            </div>
        </div>
        <!-- End Quote Area  -->

    </div>


    <div class="container">

        <!-- Start Tim Area -->
        <div class="row tim justify-content-center">
            <div class="col-12 judul">
                <h3>Tim Pengembang</h3>
                <div class="garis"></div>
            </div>
            <div class="col-12 col-md-3 profil-tim">
                <img src="{{ asset('frontend/img/tim1.png') }}" width="150" alt="profil-tim">
                <h5>Vicky Irmanto</h5>
                <p>Marketing Officer, UI/UX & Brand Designer</p>
            </div>
            <div class="col-12 col-md-3 profil-tim">
                <img src="{{ asset('frontend/img/tim2.png') }}" width="150" alt="profil-tim">
                <h5>Arya Ashari</h5>
                <p>Web Developer</p>
            </div>
        </div>
        <!-- End Tim Area -->

    </div>

@endsection
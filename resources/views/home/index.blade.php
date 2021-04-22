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
                    <h2>Platform Penjualan Produk Lokal</h2>
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
                    <form action=""></form>
                        <div class="search-box d-flex">
                            <button type="submit"><img src="{{ asset('frontend/img/icon/search.png') }}" class="search-icon" alt="search-icon"></button>
                            <input type="search" name="search" placeholder="Cari produk" autocomplete="off">
                        </div>
                    </form>
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
            <div class="row pagination-card">
                <div class="col">
                    <ul class="pagination">
                        <li class="arrow-back"><a href="#"><img src="{{ asset('frontend/img/icon/arrow_back_sm.png') }}" alt="arrow-back"></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="arrow-next"><a href="#"><img src="{{ asset('frontend/img/icon/arrow_sm.png') }}" alt="arrow"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Area -->

@endsection
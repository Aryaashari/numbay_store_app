@extends('layouts.frontend')

@section('title', 'Numbay Store - Nama produk')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-produk.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush

@push('js')
    <script>
        $(document).ready(function () {
            $('.text-produk .selengkapnya').click(function (_) { 
                $('.popup-deskripsi').css('display', 'flex');
            });
            $('.close-button a').click(function (_) { 
                $('.popup-deskripsi').css('display', 'none');
            });
        }); 
    </script>
@endpush


@section('navbar')
    <x-navbar-frontend2></x-navbar-frontend2>
@endsection


@section('id', 'detail-produk')
@section('content')
    <!-- Popup Deskripsi -->
    <div class="popup-deskripsi">
        <div class="container">
            <div class="deskripsi-card">
                <div class="close-button">
                    <a href="#"><img src="{{ asset('frontend/img/icon/close.png') }}" alt="close-icon"></a>
                </div>
                <div class="deskripsi-text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- Start Card Produk -->
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="img-card">
                        <div class="img" style="background-image: url({{ asset('frontend/img/produk/somay.png') }});"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="text-produk">
                        <h3 class="title">Siomay</h3>
                        <h2 class="harga">Rp 5000</h2>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo ultrices ipsum donec diam, mi neque orci. Fermentum euismod tellus dolor pellentesque neque scelerisque. adipiscing elit. Commodo ultrices ... <a href="#" class="selengkapnya">Selengkapnya</a></p>
                        <div class="d-flex mb-4">
                            <a href="form-pemesanan.html" class="btn btn-warning beli">Beli</a>
                            <a href="#" class="btn btn-secondary whislist">
                                <img src="{{ asset('frontend/img/icon/love.png') }}" alt="whislist">
                            </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="profil-toko.html" class="text-decoration-none">
                                <div class="card-toko d-flex align-items-center">
                                    <div class="img-toko" style="background-image: url({{ asset('frontend/img/icon/toko.png') }});"></div>
                                    <div class="text">
                                        <h5>Nama toko</h5>
                                        <p>Sentani</p>
                                    </div>
                                </div>
                            </a>
                            <div class="produk-bermasalah text-right">
                                <p>Produk bermasalah?</p>
                                <a href="#"><img src="{{ asset('frontend/img/icon/report.png') }}" alt="report"> Laporkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Produk -->
@endsection
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
                $('.modal.deskripsi-produk').modal().show();
            });
        }); 
    </script>
@endpush


@section('navbar')
    <x-navbar-frontend2></x-navbar-frontend2>
@endsection


@section('id', 'detail-produk')
@section('content')
    <!-- Modal Deskripsi Produk -->
    <div class="modal deskripsi-produk fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bold" id="exampleModalLongTitle">Deskripsi Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! nl2br(e($products->deskripsi_produk)) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <div class="img" style="background-image: url({{ asset('frontend/img/produk/'.$products->foto_produk) }});"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="text-produk">
                        <h3 class="title">{{ $products->nama_produk }}</h3>
                        <h2 class="harga">Rp {{ $products->harga_produk }}</h2>
                        <p class="desc">

                            {!! nl2br(e(Str::limit($products->deskripsi_produk, 240, '...'))) !!} 
                            @if (strlen($products->deskripsi_produk) > 50)
                                <a href="#" class="selengkapnya">Selengkapnya</a>
                            @endif

                        </p>
                        <div class="d-flex mb-4">
                            <a href="form-pemesanan.html" class="btn btn-warning beli">Beli</a>
                            <a href="#" class="btn btn-secondary whislist">
                                <img src="{{ asset('frontend/img/icon/love.png') }}" alt="wishlist">
                            </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('profile/store/'.$products->store->slug) }}" class="text-decoration-none">
                                <div class="card-toko d-flex align-items-center">
                                    <div class="img-toko" style="background-image: url({{ asset('frontend/img/icon/'.$products->store->foto_profile_toko) }});"></div>
                                    <div class="text">
                                        <h5>{{ Str::limit($products->store->nama_toko, 12, '...') }}</h5>
                                        <p>{{ Str::limit($products->store->alamat_toko, 23, '...') }}</p>
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
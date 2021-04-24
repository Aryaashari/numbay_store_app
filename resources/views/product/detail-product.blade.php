@extends('layouts.frontend')

@section('title', 'Numbay Store - Nama produk')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-produk.css') }}">
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
    <x-navbar-frontend></x-navbar-frontend>
@endsection


@section('id', 'detail-produk')
@section('content')
    <!-- Modal Deskripsi Produk -->
    <div class="modal deskripsi-produk fade" id="modalDeskripsi" tabindex="-1" role="dialog" aria-labelledby="modalDeskripsiTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bold" id="modalDeskripsiTitle">Deskripsi Produk</h5>
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



    <!-- Modal Status -->
    @if (session('status'))
        <div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="modalStatusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>{{ session('status') }}</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="location.reload();" class="btn btn-primary" data-dismiss="modal">Oke</button>
                    </div>
                </div>
            </div>
        </div>
    @endif




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
                                <a class="selengkapnya">Selengkapnya</a>
                            @endif

                        </p>
                        <div class="d-flex mb-4">
                            <a href="form-pemesanan.html" class="btn btn-warning beli">Beli</a>

                            <a class="btn btn-secondary whislist" onclick="$('.form-wishlist').submit();">

                                {{-- Cek jika product disukai user atau tidak --}}
                                <img src="{{ ($isLike) ? asset('frontend/img/icon/love_red.png') : asset('frontend/img/icon/love.png') }}" class="love-icon-red" alt="wishlist">
                                
                            </a>
                            <form action="{{ ($isLike) ? url('/wishlist/remove/product/'.$products->slug) : url('/wishlist/add/product/'.$products->slug) }}" method="POST" class="d-none form-wishlist">@csrf</form>


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

@push('js')
    @if (session('status'))
        <script>
            $('#modalStatus').modal().show();
        </script>
    @endif
@endpush
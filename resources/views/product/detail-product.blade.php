@extends('layouts.frontend')

@section('title', 'Numbay Store - '.$product->nama_produk)


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
                    {!! nl2br(e($product->deskripsi_produk)) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                        <div class="img" style="background-image: url({{ asset('frontend/img/produk/'.$product->foto_produk) }});"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="text-produk">
                        <h3 class="title">{{ $product->nama_produk }}</h3>
                        <h2 class="harga">Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</h2>
                        <p class="desc">

                            {!! nl2br(e(Str::limit($product->deskripsi_produk, 240, '...'))) !!} 
                            @if (strlen($product->deskripsi_produk) > 50)
                                <a href="#" class="selengkapnya">Selengkapnya</a>
                            @endif

                        </p>
                        <div class="d-flex mb-4">
                            <a href="{{ url('product/'.$product->slug.'/order') }}" class="btn btn-warning beli">Beli</a>

                            <a class="btn btn-secondary whislist" onclick="$('.form-wishlist').submit();">

                                {{-- Cek jika product disukai user atau tidak --}}
                                <img src="{{ ($isLike) ? asset('frontend/img/icon/love_red.png') : asset('frontend/img/icon/love.png') }}" class="love-icon-red" alt="wishlist">
                                
                            </a>
                            <form action="{{ ($isLike) ? url('/wishlist/remove/product/'.$product->slug) : url('/wishlist/add/product/'.$product->slug) }}" method="POST" class="d-none form-wishlist">@csrf</form>


                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('profile/store/'.$product->store->slug) }}" class="text-decoration-none">
                                <div class="card-toko d-flex align-items-center">
                                    <div class="img-toko" style="background-image: url({{ asset('frontend/img/icon/'.$product->store->foto_profile_toko) }});"></div>
                                    <div class="text">
                                        <h5>{{ Str::limit($product->store->nama_toko, 12, '...') }}</h5>
                                        <p>{{ Str::limit($product->store->alamat_toko, 23, '...') }}</p>
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
            swal({
                icon: 'success',
                text: '<?php echo session('status') ?>',
            }).then((_) => {
                location.reload();
            });
        </script>
    @endif
@endpush
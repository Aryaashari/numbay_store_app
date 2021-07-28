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
                        <div class="img" style="background-image: url({{ asset('storage/uploads/product/'.$product->foto_produk) }});"></div>
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

                            
                            <a href="#" onclick="$('.form-order').submit()" class="btn btn-warning beli">Beli</a>

                            {{-- Jumlah Pesanan --}}
                            <div class="jumlah-pesanan">

                                <div class="kurang">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                                
                                <div class="angka">
                                        <form action="{{ url('product/order') }}" class="form-order" method="get">
                                            <p style="margin-top: 18px">1</p>
                                            <input type="hidden" name="produk" value="{{ $product->slug }}">
                                            <input type="hidden" name="jumlah_pesanan" value="1">
                                        </form>
                                </div>
                                
                                <div class="tambah">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                            </div>
                            

                            <a class="btn btn-secondary whislist" onclick="$('.form-wishlist').submit();">

                                {{-- Cek jika product disukai user atau tidak --}}
                                <img src="{{ ($isLike) ? asset('frontend/img/icon/love_red.png') : asset('frontend/img/icon/love.png') }}" class="love-icon-red" alt="wishlist">
                                
                            </a>
                            <form action="{{ ($isLike) ? url('/wishlist/remove/product/'.$product->slug) : url('/wishlist/add/product/'.$product->slug) }}" method="POST" class="d-none form-wishlist">@csrf</form>


                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('profile/store/'.$product->store->slug) }}" class="text-decoration-none">
                                <div class="card-toko d-flex align-items-center">
                                    <div class="img-toko" style="background-image: url({{ asset('storage/uploads/store/'.$product->store->foto_profile_toko) }});"></div>
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

    <script>
        $(document).ready(function () {
            // #### Atur width dan height sesuai orientasi gambar produk ###
            
            // Abmil element gambar dari background image
            let gambarProduk = $('.img').css('backgroundImage').replace(/url\((['"])?(.*?)\1\)/gi, '$2').split(',')[0];

            // Buat object Image baru, dan masukkan gambarProduk sebagai src
            let image = new Image();
            image.src = gambarProduk;

            // Responsive breakpoints
            let mobile = window.matchMedia("(max-width: 767px)");
            let tablet = window.matchMedia("(min-width: 768px) and (max-width: 991px)");

            // Check jika gambar berorientasi potrait, landscape, atau kotak
            if (image.width > image.height) {
                // Landscape
                if (mobile.matches) {
                    $('.img-card').css('width', '100%');
                    $('.img').css('height', '260px');
                } else {
                    $('.img-card').css('width', '95%');
                    $('.img').css('height', '375px');
                }



            } else if (image.width < image.height) {
                // Potrait
                if (mobile.matches) {
                    $('.img-card').css('width', '320px');
                    $('.img').css('height', '450px');
                } else if (tablet.matches) {
                    $('.img-card').css('width', '55%');
                    $('.img').css('height', '500px');
                } else {
                    $('.img-card').css('width', '75%');
                    $('.img').css('height', '500px');
                }


            } else {
                // Kotak

                if (mobile.matches) {
                    $('.img-card').css('width', '300px', '!important');
                    $('.img').css('height', '300px');
                } else {
                    $('.img-card').css('width', '450px');
                    $('.img').css('height', '450px');
                }
                

            }



            // === Jumlah pesanan ===
            let jumlahPesanan = 1;

            // Ketika tombol tambah diklik
            $('.tambah').click(function () { 
                $('.angka p').html(++jumlahPesanan);
                $('.angka input[name="jumlah_pesanan"]').val(jumlahPesanan);
            });

            // Ketika tombol kurang diklik
            $('.kurang').click(function () { 
                if (jumlahPesanan > 1) {
                    $('.angka p').html(--jumlahPesanan);
                    $('.angka input[name="jumlah_pesanan"]').val(jumlahPesanan);
                }
            });



        });
    </script>
@endpush
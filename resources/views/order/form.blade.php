@extends('layouts.frontend')

@section('title', 'Numbay Store - Order Product')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/form-pemesanan.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
@endpush


@section('navbar')
    <!-- Start Navbar Area -->
    <nav class="navbar nav-back-user py-3">
        <div class="container">
            <div class="arrow-back">
                <a href="index.html"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="tombol-kembali"></a>
            </div>
        </div>
    </nav>
    <!-- End Navbar Area -->
@endsection


@section('id', 'form-pemesanan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title">Form Pemesanan Produk</h1>
                        <p class="nama-produk">Siomay</p>
                    </div>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="nama_penerima" class="form-control" placeholder="Nama Penerima">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon Penerima">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="jumlah_pesanan" class="form-control" placeholder="Jumlah Pesanan">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea name="alamat_pengantaran" placeholder="Alamat Lengkap Pengantaran" class="form-control" rows="3"></textarea>
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form">
                                <textarea name="keterangan_tambahan" placeholder="Keterangan Tambahan" class="form-control" rows="3"></textarea>
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-12 text-md-left text-center">
                            <div class="detail-pemesanan">
                                <h5>Jumlah pemesanan</h5>
                                <h3>Rp 5.000</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 text-md-right text-center">
                            <div class="form">
                                <button type="submit" class="btn btn-warning">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
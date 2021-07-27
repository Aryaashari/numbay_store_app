@extends('layouts.frontend')

@section('title', 'Numbay Store - Order '.$product->nama_produk)


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
                <a href="{{ url('detail/product/'.$product->slug) }}"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="tombol-kembali"></a>
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
                        <p class="nama-produk">{{ $product->nama_produk }}</p>
                        <p class="harga-produk">Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</p>
                    </div>
                </div>
                <form action="{{ url('/product/'.$product->slug.'/order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="nama_penerima" class="form-control @error('nama_penerima') is-invalid @enderror" value="{{ old('nama_penerima') }}" placeholder="Nama Penerima">
                                @error('nama_penerima')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="no_telp_penerima" class="form-control @error('no_telp_penerima') is-invalid @enderror" value="{{ old('no_telp_penerima') }}" placeholder="No. Telepon Penerima">
                                @error('no_telp_penerima')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" class="form-control" disabled value="Jumlah pesanan: {{ $jumlahPesanan }}">
                                <input type="hidden" name="jumlah_pesanan" class="form-control" value="{{ $jumlahPesanan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea name="alamat_pengantaran" placeholder="Alamat Lengkap Pengantaran" class="form-control @error('alamat_pengantaran') is-invalid @enderror" rows="3">{{ old('alamat_pengantaran') }}</textarea>
                                @error('alamat_pengantaran')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form">
                                <textarea name="keterangan_tambahan" placeholder="Keterangan Tambahan" class="form-control @error('keterangan_tambahan') is-invalid @enderror" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 text-md-left text-center">
                            <div class="detail-pemesanan">
                                <h5>Total harga</h5>
                                <h3>Rp {{ number_format($product->harga_produk*$jumlahPesanan, 0, '.', '.') }}</h3>
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
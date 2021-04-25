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
                        {{-- <div class="col-12">
                            <div class="form">
                                <input type="text" name="jumlah_pesanan" id="jumlah-pesanan" class="form-control @error('jumlah_pesanan') is-invalid @enderror" value="{{ old('jumlah_pesanan') ?? 1 }}" data-harga="{{ $product->harga_produk }}" placeholder="Jumlah Pesanan (minimal 1)">
                                
                                @error('jumlah_pesanan')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
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
                                <h5>Jumlah pemesanan</h5>
                                <h3>Rp {{ $product->harga_produk }}</h3>
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

@push('js')
    {{-- <script>
        $(document).ready(function () {
            const valueJumlahPesanan = $('#jumlah-pesanan').val();
            const formJumlahPesanan = $('#jumlah-pesanan');
            const totalHarga = $('.detail-pemesanan h3');

            formJumlahPesanan.keyup(function (e) { 
                let jumlahPesanan = formJumlahPesanan.data('harga')*formJumlahPesanan.text(this).val();
                if (jumlahPesanan < 10000) {
                    totalHarga.text('Rp '+formJumlahPesanan.data('harga'));
                } else if(jumlahPesanan >= 1000000) {
                    totalHarga.text('Rp '+(jumlahPesanan/1000000).toFixed(3)+'.000');
                } else {
                    totalHarga.text('Rp '+(jumlahPesanan/1000).toFixed(3));
                }
            });
        });
    </script> --}}
@endpush
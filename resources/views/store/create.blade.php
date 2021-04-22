@extends('layouts.frontend')

@section('title', 'Numbay Store - Buat Toko')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/buat-toko.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').select2({
                placeholder: 'Kategori toko',
            })
        });
    </script>
@endpush


@section('navbar')
    <x-navbar-frontend2></x-navbar-frontend2>
@endsection


@section('id', 'buat-toko')
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center title">Buat Toko Baru</h2>
                        <div class="garis mx-auto"></div>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="img-profile" style="background-image: url({{ asset('frontend/img/icon/profile_toko.png') }});">
                                <label for="upload" class="upload-icon">
                                    <img src="{{ asset('frontend/img/icon/upload_gambar.png') }}" width="40" alt="icon_upload_gambar">
                                </label>
                                <input class="d-none" type="file" name="foto_profile" id="upload">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form">
                                <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko">
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                            <div class="form">
                                <input class="form-control" type="text" name="no_hp" placeholder="No. Whatsapp">
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                            <div class="form">
                                <select name="kategori" multiple>
                                    <option value="kuliner">Kuliner</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form">
                                <input class="form-control" type="text" name="akun_facebook" placeholder="Akun Facebook">
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form">
                                <input class="form-control" type="text" name="akun_ig" placeholder="Akun Instagram">
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea class="form-control" name="deskripsi_toko" class="desc-toko" rows="5" placeholder="Deskripsi singkat tentang toko"></textarea>
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea class="form-control" name="alamat_toko" class="desc-toko" rows="5" placeholder="Alamat Toko"></textarea>
                                <!-- <div class="invalid-feedback">
                                    Pesan error
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning selesai">Selesai</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
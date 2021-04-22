@extends('layouts.frontend')

@section('title', 'Numbay Store - Edit Profile')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/edit-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/form.css') }}">
@endpush


@section('id', 'edit-user')
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title">Edit informasi user</h1>
                        <div class="garis mx-auto"></div>
                    </div>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="img-user" style="background-image: url({{ asset('frontend/img/icon/user_lg.png') }});">
                                <label for="upload-img"><img src="{{ asset('frontend/img/icon/edit.png') }}" alt="upload-icon"></label>
                                <input type="file" class="d-none" name="img-user" id="upload-img">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form">
                                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="no_hp" class="form-control" placeholder="No. Whatsapp">
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea name="alamat" placeholder="Alamat Rumah" class="form-control" rows="5"></textarea>
                                <!-- <div class="invalid-feedback d-block">
                                    pesan error
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="form">
                                <button type="submit" class="btn btn-warning">Selesai</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
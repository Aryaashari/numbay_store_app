@extends('layouts.dashboard')


@section('title', 'Numbay Store - Ptofile Toko')
@section('title-page', 'Profile Toko')


@push('css')
    <link href="{{ asset('dashboard/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/css/elements/avatar.css') }}" rel="stylesheet" type="text/css">
    <style>
        .user-profile .widget-content-area h3:after {
            position: absolute;
            content: "";
            height: 2px;
            width: 55px;
            background: #1b55e2;
            border-radius: 50%;
            bottom: -5px;
            left: 15px;
        }
    </style>
@endpush


@section('content')
<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="" after>Info Toko</h3>
                </div>
                <div class="text-center user-info">
                    <div class="avatar avatar-xl" style="width: 10.125rem; height: 10.125rem;">
                        <img src="{{ asset('storage/uploads/store/'.$store->foto_profile_toko) }}" alt="avatar">
                    </div>
                    <p class="">{{ $store->nama_toko }}</p>
                </div>
                <div class="alamat text-center">
                    <p>{{ $store->alamat_toko }}</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                No Telp: {{ $store->no_telp_toko }}
                            </li>
                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                Kategori: {{ (count($categoryStores) > 0) ? implode(',', $categoryStores) : 'Tidak ada' }}
                            </li>
                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                Akun IG: {{ $store->akun_instagram ?? 'Tidak ada' }}
                            </li>
                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                Akun FB: {{ $store->akun_facebook ?? 'Tidak ada' }}
                            </li>
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

        <div class="bio layout-spacing ">
            <div class="widget-content widget-content-area pb-4">
                <h3 class="">Deskripsi Toko</h3>
                <p>{!! ($store->deskripsi_toko) ? nl2br(e($store->deskripsi_toko)) : 'Tidak ada' !!}</p>
            </div>                                
        </div>

    </div>

</div>
@endsection
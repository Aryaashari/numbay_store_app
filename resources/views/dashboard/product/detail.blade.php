@extends('layouts.dashboard')

@section('title', 'Numbay Store - Lihat Produk')
@section('title-page', 'Detail Produk')


@push('css')
    <link href="{{ asset('dashboard/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css">
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
    
    <div class="col-12 mt-2">
        <div class="breadcrumb-five">
            <ul class="breadcrumb">
                <li class="mb-2"><a href="{{ (request()->is('store/*') ? url('/store/products') : url('/admin/products')) }}">Produk</a>
                </li>
                <li class="active mb-2"><a href="javscript:void(0);">Detail Produk</a></li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="" after>Info Produk</h3>
                </div>
                <div class="text-center user-info">
                    <img src="{{ asset('storage/uploads/product/'.$product->foto_produk) }}" width="250" alt="avatar">
                    <p class="">{{ $product->nama_produk }}</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            
                            @if (request()->is('admin/*'))
                                <li class="contacts-block__item text-center" style="font-size: 16px">
                                    Toko: {{ $product->store->nama_toko }}
                                </li>
                            @endif

                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                Harga: Rp {{ number_format($product->harga_produk, 0, '.', '.') }}
                            </li>
                            <li class="contacts-block__item text-center" style="font-size: 16px">
                                Kategori: {{ $product->category->kategori ?? 'Tidak ada' }}
                            </li>
                            {{-- <li class="contacts-block__item text-center" style="font-size: 16px">
                                Tampilkan Produk: {{ $product->tampilkan_produk }}
                            </li> --}}
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

        <div class="bio layout-spacing ">
            <div class="widget-content widget-content-area pb-4">
                <h3 class="">Deskripsi</h3>
                <p>{!! nl2br(e($product->deskripsi_produk)) !!}</p>
            </div>                                
        </div>

    </div>

</div>
@endsection
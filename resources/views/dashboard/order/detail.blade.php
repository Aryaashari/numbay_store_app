@extends('layouts.dashboard')

@section('title', 'Numbay Store - Admin | Detail Pesanan')
@section('title-page', 'Detail Pesanan')

@push('css')
    <link href="{{ asset('dashboard/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css">
    <style>
        th {
            width: 200px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid rgba(0, 0, 0, 0.137);
        }
    </style>
@endpush


@section('content')

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12 mt-2">
            <div class="breadcrumb-five">
                <ul class="breadcrumb">
                    <li class="mb-2"><a href="{{ url('/admin/orders') }}">Pesanan</a>
                    </li>
                    <li class="active mb-2"><a href="javscript:void(0);">Detail Pesanan</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="statbox widget box box-shadow p-3 mt-3">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ url('/admin/orders') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Id - User</th>
                                <td>{{ $order->user->id }} - {{ $order->user->nama_depan }} {{ $order->user->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <th>Id - Toko</th>
                                <td>{{ $order->product->id }} - {{ $order->product->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Penerima</th>
                                <td>{{ $order->nama_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Telp Penerima</th>
                                <td>{{ $order->no_telp_penerima }}</td>
                            </tr><tr>
                                <th>Alamat Penerima</th>
                                <td>{{ $order->alamat_pengantaran }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan Tambahan</th>
                                <td>{{ $order->keterangan_tambahan ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
@endsection
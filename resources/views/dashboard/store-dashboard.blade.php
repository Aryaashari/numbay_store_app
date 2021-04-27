@extends('layouts.dashboard')

@section('title', 'Numbay Store - Dashboard')
@section('title-page', 'Dashboard')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/widgets/modules-widgets.css') }}">
@endpush

@push('js')
    <script src="{{ asset('dashboard/js/widgets/modules-widgets.js') }}"></script>    
@endpush


@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-4">
            <div class="widget widget-five widget-activity-one">
                <div class="widget-content">

                    <div class="header align-items-center">
                        <div class="header-body">
                            <h6>Total Produk</h6>
                        </div>
                        <div class="activity-selector">
                            <select class="form-control mb-0 text-right">
                                <option>Semua</option>
                                <option>Kemarin</option>
                                <option>Hari Ini</option>
                                <option>1 Bulan</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="">                                            
                            <p class="task-left">{{ count($store->products) }}</p>
                        </div>
                        <div class="tm-action-btn">
                            <a href="#" class="btn">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

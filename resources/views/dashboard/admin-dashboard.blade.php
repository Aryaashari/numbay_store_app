@extends('layouts.dashboard')


@section('title', 'Numbay Store - Admin | Dashboard')
@section('title-page', 'Dasbor')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/widgets/modules-widgets.css') }}">
@endpush

@push('js')
    <script src="{{ asset('dashboard/js/widgets/modules-widgets.js') }}"></script> 
@endpush



@section('content')

<div class="row mt-3">
    <div class="col-12 col-md-4 mb-3">
        <div class="widget widget-five widget-activity-one">
            <div class="widget-content">

                <div class="header align-items-center">
                    <div class="header-body">
                        <h6>Total User</h6>
                    </div>
                </div>

                <div class="w-content">
                    <div class="">                                            
                        <p class="task-left">{{ count($users) }}</p>
                    </div>
                    <div class="tm-action-btn">
                        <a href="#" class="btn">Lihat User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <div class="widget widget-five widget-activity-one">
            <div class="widget-content">

                <div class="header align-items-center">
                    <div class="header-body">
                        <h6>Total Toko</h6>
                    </div>
                </div>

                <div class="w-content">
                    <div class="">                                            
                        <p class="task-left">{{ count($stores) }}</p>
                    </div>
                    <div class="tm-action-btn">
                        <a href="{{ url('admin/stores') }}" class="btn">Lihat Toko</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <div class="widget widget-five widget-activity-one">
            <div class="widget-content">

                <div class="header align-items-center">
                    <div class="header-body">
                        <h6>Total Produk</h6>
                    </div>
                </div>

                <div class="w-content">
                    <div class="">                                            
                        <p class="task-left">{{ count($products) }}</p>
                    </div>
                    <div class="tm-action-btn">
                        <a href="{{ url('admin/products') }}" class="btn">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
                        {{-- <div class="activity-selector">
                            <select class="form-control mb-0 text-right">
                                <option>Semua</option>
                                <option>Kemarin</option>
                                <option>Hari Ini</option>
                                <option>1 Bulan</option>
                            </select>
                        </div> --}}
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
        <div class="col-12 col-md-8">
            <div class="widget-four widget">
                <div class="widget-heading">
                    <h5 class="">Top 3 Produk Paling Diminati</h5>
                </div>
                <div class="widget-content">
                    <div class="vistorsBrowser">
                        <div class="browser-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="w-browser-details">
                                <div class="w-browser-info">
                                    <h6>Chrome</h6>
                                    <p class="browser-count">65%</p>
                                </div>
                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="w-browser-details">
                                
                                <div class="w-browser-info">
                                    <h6>Safari</h6>
                                    <p class="browser-count">25%</p>
                                </div>

                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="browser-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="w-browser-details">
                                
                                <div class="w-browser-info">
                                    <h6>Others</h6>
                                    <p class="browser-count">15%</p>
                                </div>

                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

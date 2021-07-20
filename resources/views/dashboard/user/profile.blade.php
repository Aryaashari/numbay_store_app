@extends('layouts.dashboard')

@section('title', 'Numbay Store - Admin | Edit Profile')
@section('title-page', 'Profile Pengguna')


@push('css')
    <link href="{{ asset('dashboard/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css">
    @error('foto_profile')
        <style>
            .general-info .info .dropify-wrapper {
                border: 1.5px red solid;
            }
        </style>
    @enderror
@endpush
@push('js')
    <script src="{{ asset('dashboard/js/users/account-settings.js') }}"></script>
@endpush



@section('content')


{{-- Breadcrumb --}}
<div class="row">
    <div class="col-12 mt-2">
        <div class="breadcrumb-five">
            <ul class="breadcrumb">
                <li class="mb-2"><a href="{{ url('/admin/users') }}">Pengguna</a>
                </li>
                <li class="active mb-2"><a href="javscript:void(0);">Profile Pengguna</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="account-settings-container layout-top-spacing">

    <div class="section general-info">
    
        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                            <div class="upload mt-4 pr-md-4">
                                                <img src="{{ asset('storage/uploads/user/'.$user->foto_profile_user) }}" alt="profile-pengguna" width="125">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Nama Pengguna</label>
                                                        <p>{{ $user->nama_depan }} {{ $user->nama_belakang }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Email</label>
                                                        <p>{{ $user->email }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>No Telp</label>
                                                        <p>{{ $user->no_telp }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Alamat</label>
                                                        <p>{{ $user->alamat_rumah }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Role</label>
                                                        @foreach ($user->getRoleNames() as $role)
                                                            <ul>
                                                                <li>{{ $role }}</li>
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@extends('layouts.dashboard')

@section('title', 'Numbay Store - Edit Profile Admin')
@section('title-page', 'Edit Profile')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('dashboard/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css">
    @error('foto_profile')
        <style>
            .general-info .info .dropify-wrapper {
                border: 1.5px red solid;
            }
        </style>
    @enderror
@endpush
@push('js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    @if (session('status'))
        <script>
            Snackbar.show({
                text: '<?php echo session('status') ?>',
                pos: 'top-center',
                actionTextColor: '#fff',
                backgroundColor: '#8dbf42',
                actionText: 'Oke',
                onActionClick: function(_) {
                    location.reload();
                }
            });
        </script>
    @endif
@endpush



@section('content')
<div class="account-settings-container layout-top-spacing">

    <form id="general-info" class="section general-info" action="{{ url('admin/profile/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                                                <input type="file" id="input-file-max-fs" class="dropify is-invalid" data-default-file="{{ asset('storage/uploads/user/'.$user->foto_profile_user) }}" name="foto_profile" accept=".jpg, .jpeg, .png" data-max-file-size="5M" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                @error('foto_profile')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="namaDepan">Nama Depan</label>
                                                            <input type="text" class="form-control mb-4 @error('nama_depan') is-invalid @enderror" id="namaDepan" name="nama_depan" placeholder="Masukkan nama toko" value="{{ old('nama_depan') ?? $user->nama_depan }}">
                                                            @error('nama_depan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="namaBelakang">Nama Belakang</label>
                                                            <input type="text" class="form-control mb-4 @error('nama_belakang') is-invalid @enderror" id="namaBelakang" name="nama_belakang" placeholder="Masukkan nama toko" value="{{ old('nama_belakang') ?? $user->nama_belakang }}">
                                                            @error('nama_belakang')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="noTelp">No Telepon</label>
                                                            <input type="text" class="form-control mb-4 @error('no_telp') is-invalid @enderror" id="noTelp" name="no_telp" placeholder="Masukkan no whatsapp toko" value="{{ old('no_telp') ?? $user->no_telp }}">
                                                            @error('no_telp')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="alamat_rumah">Alamat</label>
                                                            <textarea name="alamat_rumah" id="alamat_rumah" rows="3" class="form-control @error('alamat_rumah') is-invalid @enderror">{{ old('alamat_rumah') ?? $user->alamat_rumah }}</textarea>
                                                            @error('alamat_rumah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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

        <div class="account-settings-footer">
            
            <div class="as-footer-container">

                <a href="{{ url('admin/dashboard') }}" id="multiple-reset" class="btn btn-warning">Kembali</a>
                <button id="multiple-messages" type="submit" class="btn btn-primary">Edit Profile</button>

            </div>

        </div>
    </form>

</div>
@endsection
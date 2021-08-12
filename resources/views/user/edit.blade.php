@extends('layouts.frontend')

@section('title', 'Numbay Store - Edit Profile')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/edit-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/form.css') }}">
@endpush


@section('navbar')
    <x-navbar-frontend></x-navbar-frontend>
@endsection


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
                <form action="{{ url('user/profile/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="img-user" style="background-image: url({{ asset('storage/uploads/user/'.$user->foto_profile_user) }});">
                                <label for="upload-img"><img src="{{ asset('frontend/img/icon/edit.png') }}" alt="upload-icon"></label>
                                <input type="file" class="d-none input-img" name="img_user" id="upload-img" accept=".jpg, .png, .jpeg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form">
                                <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror" placeholder="Nama Depan" value="{{ old('nama_depan') ?? $user->nama_depan }}">
                                @error('nama_depan')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" placeholder="Nama Belakang" value="{{ old('nama_belakang') ?? $user->nama_belakang }}">
                                @error('nama_belakang')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No. Whatsapp" value="{{ old('no_telp') ?? $user->no_telp }}">
                                @error('no_telp')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea name="alamat" placeholder="Alamat Rumah" class="form-control @error('alamat') is-invalid @enderror" rows="5">{{ old('alamat') ?? $user->alamat_rumah }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="{{ url('/change-password') }}">Ubah Password?</a>
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


@push('js')
    <script>
        $(document).ready(function () {
            const imgPreview = $('.img-user');
            const inputFile = $('.input-img');
            const imgPreviewUrl = imgPreview.css('background-image');
            

            inputFile.change(function(e) {
                if(e.target.files[0]) {
                    let fileUploadPath = this.value;
                    const file = URL.createObjectURL(e.target.files[0]);

                    const extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                    if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
                        if (e.target.files[0].size > 2000000) {
                            imgPreview.css('background-image', imgPreviewUrl);
                            inputFile.val('');
                            swal({
                                icon: 'warning',
                                text: 'Ukuran file terlalu besar, maksimal 2 MB'
                            });
                        } else {
                            imgPreview.css('background-image', 'url('+ file +')');
                        }

                    } else {
                        imgPreview.css('background-image', imgPreviewUrl);
                        inputFile.val('');
                        swal({
                            icon: 'warning',
                            text: 'File yang diupload harus berupa jpg, jpeg, atau png'
                        });
                    }
                }
            });
        });
    </script>

    @if (session('status'))
        <script>
            swal({
                icon: 'success',
                title: 'Profile berhasil diubah!',
            });
        </script>
    @elseif (session('successChangePassword'))
        <script>
            swal({
                icon: 'success',
                title: 'Password berhasil diubah!',
            });
        </script>
    @endif
@endpush
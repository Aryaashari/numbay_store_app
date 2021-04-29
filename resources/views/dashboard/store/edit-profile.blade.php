@extends('layouts.dashboard')

@section('title', 'Numbay Store - Edit Profile Toko')
@section('title-page', 'Edit Profile Toko')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('dashboard/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script>
        $(".kategori").select2({
            tags: false
        });
    </script>
@endpush



@section('content')
<div class="account-settings-container layout-top-spacing">

    <form id="general-info" class="section general-info">
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
                                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('storage/uploads/store/'.$store->foto_profile_toko) }}" name="foto_profile_toko" accept=".jpg, .jpeg, .png" data-max-file-size="5M" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="namaToko">Nama Toko</label>
                                                            <input type="text" class="form-control mb-4" id="namaToko" name="nama_toko" placeholder="Masukkan nama toko" value="{{ old('nama_toko') ?? $store->nama_toko }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="noTelp">No Whatsapp</label>
                                                            <input type="text" class="form-control mb-4" id="noTelp" name="no_telp_toko" placeholder="Masukkan no whatsapp toko" value="{{ old('no_telp_toko') ?? $store->no_telp_toko }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="akunIg">Akun Instagram</label>
                                                            <input type="text" class="form-control mb-4" id="akunIg" name="akun_ig" value="{{ old('akun_ig') ?? $store->akun_instagram }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="akunFb">Akun Facebook</label>
                                                            <input type="text" class="form-control mb-4" id="akunFb" name="akun_fb" value="{{ old('akun_fb') ?? $store->akun_facebook }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select class="form-control kategori" name="categories[]" multiple="multiple">
                                                                
                                                                @foreach ($categories as $category)
                                                                    @if (count($store->categories) > 0)

                                                                        @if (in_array($category->kategori, $storeCategories))
                                                                            <option value="{{ $category->id }}" selected>{{ $category->kategori }}</option>
                                                                        @else
                                                                            <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                                                        @endif

                                                                    @else  

                                                                        <option value="{{ $category->id }}">{{ $category->kategori }}</option>

                                                                    @endif
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="alamat_toko">Alamat Toko</label>
                                                            <textarea name="alamat_toko" id="alamat_toko" rows="3" class="form-control">{{ old('alamat_toko') ?? $store->alamat_toko }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <div class="form-group">
                                                            <label for="deskripsi_toko">Deskripsi Toko</label>
                                                            <textarea name="deskripsi_toko" id="alamat_toko" rows="5" class="form-control">{{ old('deskripsi_toko') ?? $store->deskripsi_toko }}</textarea>
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

                <a href="{{ url('store/dashboard') }}" id="multiple-reset" class="btn btn-warning">Kembali</a>
                <button id="multiple-messages" class="btn btn-primary">Edit Profile</button>

            </div>

        </div>
    </form>

</div>
@endsection
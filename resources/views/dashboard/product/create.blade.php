@extends('layouts.dashboard')


@section('title', 'Numbay Store - Tambah Produk')
@section('title-page', 'Tambah Produk')



@push('css')
    <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endpush


@section('content')
    
    <div class="container-fluid mt-4 mb-4 pl-0 pr-0">
        <div class="row">
            <div class="col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-8 col-xl-6 col-12 mx-auto">
                                <form method="post" action="{{ url('/store/products') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}">
                                        @error('nama_produk')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <input type="text" name="harga_produk" placeholder="Harga Produk" class="form-control mt-3 @error('harga_produk') is-invalid @enderror" value="{{ old('harga_produk') }}">
                                        @error('harga_produk')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <textarea name="deskripsi_produk" cols="30" rows="10" class="form-control mt-3" placeholder="Deskripsi Produk">{{ old('deskripsi_produk') }}</textarea>
                                        @error('deskripsi_produk')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label class="d-block">Kategori</label>
                                            <select class="selectpicker" name="kategori">
                                                <option value="">Pilih Kategori...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-gropu mt-4 mb-3">
                                            <label class="d-block">Tampilkan Produk</label>
                                            <label class="switch s-primary mr-2">
                                                <input type="checkbox" checked name="tampilkan_produk">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                        <div class="form-group mt-4 mb-3">
                                            <div class="custom-file-container" data-upload-id="foto_produk">
                                                <label style="color: #acb0c3">Foto Produk <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto_produk" accept=".jpg, .jpeg, .png">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview" @error('foto_produk') style="border: 1px red solid" @enderror></div>
                                            </div>
                                            @error('foto_produk')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <a href="{{ url('/store/products') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>                                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('foto_produk')
    </script>
@endpush
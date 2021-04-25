@extends('layouts.frontend')

@section('title', 'Numbay Store - Buat Toko')


@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/buat-toko.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nav-back-user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush


@section('navbar')
    <x-navbar-frontend></x-navbar-frontend>
@endsection


@section('id', 'buat-toko')
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center title">Buat Toko Baru</h2>
                        <div class="garis mx-auto"></div>
                    </div>
                </div>
                <form action="{{ url('/store/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="img-profile" style="background-image: url({{ asset('frontend/img/icon/profile_toko.png') }});">
                                <label for="upload" class="upload-icon">
                                    <img src="{{ asset('frontend/img/icon/upload_gambar.png') }}" width="40" alt="icon_upload_gambar">
                                </label>
                                <input class="d-none" type="file" name="foto_profile_toko" id="upload" accept=".jpg, .png, .jpeg">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form">
                                <input type="text" name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" value="{{ old('nama_toko') }}" placeholder="Nama Toko">
                                
                                @error('nama_toko')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                            <div class="form">
                                <input class="form-control @error('no_telp_toko') is-invalid @enderror" value="{{ old('no_telp_toko') }}" type="text" name="no_telp_toko" placeholder="No. Whatsapp">
                                
                                @error('no_telp_toko')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                            <div class="form">
                                <select name="kategori" multiple>
                                    <option value="kuliner">Kuliner</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form">
                                <input class="form-control @error('akun_facebook') is-invalid @enderror" value="{{ old('akun_facebook') }}" type="text" name="akun_facebook" placeholder="Akun Facebook">
                                
                                @error('akun_facebook')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form">
                                <input class="form-control @error('akun_ig') is-invalid @enderror" value="{{ old('akun_ig') }}" type="text" name="akun_ig" placeholder="Akun Instagram">
                                
                                @error('akun_ig')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea class="form-control @error('deskripsi_toko') is-invalid @enderror" value="{{ old('deskripsi_toko') }}" name="deskripsi_toko" class="desc-toko" rows="5" placeholder="Deskripsi singkat tentang toko"></textarea>
                                
                                @error('deskripsi_toko')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form">
                                <textarea class="form-control @error('alamat_toko') is-invalid @enderror" value="{{ old('alamat_toko') }}" name="alamat_toko" class="desc-toko" rows="5" placeholder="Alamat Toko"></textarea>
                                
                                @error('alamat_toko')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>    
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning selesai">Selesai</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Validasi Img User -->
    <div class="modal fade" id="imgUserModal" tabindex="-1" role="dialog" aria-labelledby="imgUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="text-danger"><b>File yang diupload harus berupa jpg, jpeg, atau png</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').select2({
                placeholder: 'Kategori toko',
            })
        });
    </script>

    
    <script>
        $(document).ready(function () {
            const imgPreview = $('.img-profile');
            const inputFile = $('#upload');
            const imgPreviewUrl = imgPreview.css('background-image');


            inputFile.change(function(e) {
                if(e.target.files[0]) {
                    let fileUploadPath = this.value;
                    const file = URL.createObjectURL(e.target.files[0]);

                    const extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                    if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
                        imgPreview.css('background-image', 'url('+ file +')');

                    } else {
                        imgPreview.css('background-image', imgPreviewUrl);
                        inputFile.val('');
                        $('#imgUserModal').modal().show();
                    }
                }
            });
        });
    </script>

    @if (session('status'))
        <script>
            $(document).ready(function () {
                $('#statusModal').modal().show();
            });
        </script>
    @endif
@endpush
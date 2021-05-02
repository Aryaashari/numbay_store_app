@extends('layouts.dashboard')


@section('title', 'Numbay Store - Admin | Edit Kategori')
@section('title-page', 'Edit Kategori')


@push('css')
    <link href="{{ asset('dashboard/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css">
@endpush


@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="breadcrumb-five">
                <ul class="breadcrumb">
                    <li class="mb-2"><a href="{{ url('admin/categories') }}">Kategori</a>
                    </li>
                    <li class="active mb-2"><a href="javscript:void(0);">Edit Kategori</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 mb-4 pl-0 pr-0">
        <div class="row">
            <div class="col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-8 col-xl-6 col-12 mx-auto">
                                <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group mb-3">
                                        <input type="text" name="kategori" placeholder="Kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') ?? $category->kategori }}">
                                        @error('kategori')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Kembali</a>
                                </form>
                            </div>                                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
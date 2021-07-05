@extends('layouts.dashboard')

@section('title', 'Numbay Store - Admin | Toko')
@section('title-page', 'Toko')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('dashboard/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/css/elements/avatar.css') }}" rel="stylesheet" type="text/css">
    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            width: 200px;
            margin-left: 0;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Cari...",
            "sLengthMenu": "Tampil Data :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5 
        });
    </script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/components/notification/custom-snackbar.js') }}"></script>
    
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

    
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script>
        function confirmDelete(id) {
            swal({
                title: 'Anda yakin ingin menghapus?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    $('#formHapusToko'+id).submit();
                }
            })
        }

    </script>

@endpush



@section('content')
    
<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ url('admin/stores/create') }}" class="btn btn-primary">Tambah Toko</a>
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Pemilik Toko</th>
                            <th>No Telepon</th>
                            <th>Kategori</th>
                            <th>Foto Profile</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($stores as $store)

                            <tr>
                                <td>{{ $store->nama_toko }}</td>
                                <td>{{ $store->user->id .' - '. $store->user->nama_depan .' '. $store->user->nama_belakang }}</td>
                                <td>{{ $store->no_telp_toko }}</td>
                                <td>

                                    @if (count($store->categories) > 0)
                                        @foreach ($store->categories as $category)
                                            <ul>
                                                <li>{{ $category->kategori }}</li>
                                            </ul>
                                        @endforeach
                                    @else
                                        Kosong
                                    @endif
                                    
                                </td>
                                <td>
                                    <div class="avatar avatar-md">
                                        <img alt="avatar" src="{{ asset('storage/uploads/store/'.$store->foto_profile_toko) }}" class="rounded" width="80">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li class="mr-0 mr-md-3"><a href="{{ url('admin/stores/'.$store->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Toko"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a> </li>

                                        <li class="mr-0 mr-md-3"><a href="{{ url('admin/stores/'.$store->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>

                                        <li>
                                            <a href="javascript:void(0);" onclick="confirmDelete({{ $store->id }});" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>

                                            {{-- Form Hapus Produk --}}
                                            <form id="formHapusToko{{ $store->id }}" action="{{ url('/admin/stores/'.$store->id) }}" method="post">@csrf @method('delete')</form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
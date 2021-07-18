@extends('layouts.dashboard')

@section('title', 'Numbay Store - Admin | Pesanan')
@section('title-page', 'Pesanan')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('dashboard/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css">
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

@endpush



@section('content')
    
<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id - User</th>
                            <th>Id - Produk</th>
                            <th>Penerima</th>
                            <th>Telp Penerima</th>
                            <th style="width: 55px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($orders as $order)

                            <tr>
                                <td>{{ $order->user->id }} - {{ $order->user->nama_depan }} {{ $order->user->nama_belakang }}</td>
                                <td>{{ $order->product->id }} - {{ $order->product->nama_produk }}</td>
                                <td>{{ $order->nama_penerima }}</td>
                                <td>{{ $order->no_telp_penerima }}</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li class="mr-0 mr-md-3"><a href="{{ url('admin/categories/'.$order->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
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
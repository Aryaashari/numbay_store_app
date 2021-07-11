<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Numbay Store - Error @yield('error_code')</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />
    <link href="{{ asset('dashboard/css/pages/error/style-400.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="error404 text-center">
    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">@yield('error_code')</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text mb-4 mt-1">@yield('error_message')</p>
            <a class="btn btn-primary mt-5" onclick="window.history.back();">Kembali</a>
        </div>
    </div>    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('js/libs/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Numbay Store - Platform Penjualan Produk Lokal pertama di Jayapura')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    @auth
        <!-- Utilities CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/dropdown-user.css') }}">
    @endauth

    <!-- Google Fonts (Noto Sans) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    @stack('css')
</head>
<body id="@yield('id')">
    <!-- Start Header Area -->
    <header>

        @yield('navbar')

    </header>
    <!-- End Header Area -->

    <!-- Start Main Area -->
    <main>


        @yield('content')


    </main>
    <!-- End Main Area -->

    <!-- Start Footer Area -->
    <footer>

        <div class="bottom-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        <img src="{{ asset('frontend/img/logo_black.png') }}" class="logo" alt="Logo Numbay Store">
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row align-items-center justify-content-center">
                            <a href="#" class="btn">Feedback</a>
                            <div class="contact d-flex align-items-center">
                                <a href="#"><img src="{{ asset('frontend/img/icon/wa.png') }}" alt="whatsapp"></a>
                                <a href="#"><img src="{{ asset('frontend/img/icon/mail.png') }}" alt="mail"></a>
                                <a href="#"><img src="{{ asset('frontend/img/icon/ig.png') }}" alt="instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <p class="text-center">&copy; 2021 - numbaystore.com</p>
        </div>

    </footer>
    <!-- End Footer Area -->



    <script src="{{ asset('frontend/js/jquery-3.6.0.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    @stack('js')
    
</body>
</html>
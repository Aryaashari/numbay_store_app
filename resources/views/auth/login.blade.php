<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbay Store - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">

    <!-- Utilities CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/form.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- Google Fonts (Noto Sans) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body id="login">

    <!-- Start Main Area -->
    <main>


        <!-- Start Arrow Area -->
        <div class="arrow-back">
            <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="arrow-back"></a>
        </div>
        <!-- End Arrow Area -->


        <!-- Start Logo Area -->
        <div class="logo">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo Numbay Store">
        </div>
        <!-- End Logo Area -->


        <!-- Start Card Area -->
        <div class="container-fluid">
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <img src="{{ asset('frontend/img/icon/il_ecommerce.png') }}" alt="illustration-ecommerce">
                    </div>
                    <div class="col-md-6 col-12 text-center">
                        <h3>Login</h3>
                        <form action="" method="post">
                            @csrf
                            <div class="form">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                            <div class="form">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">Login</button>
                            <p>Belum punya akun? <span><a href="{{ url('/register') }}">Daftar</a></span></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Area -->


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


    <!-- Modal Success Register -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('frontend/img/icon/success.png') }}" width="150" class="img-fluid">
                <h5 class="mt-3 text-black font-weight-bold">Selamat anda telah berhasil daftar, silahkan verifikasi email anda segera!
            <div class="modal-footer mt-2">
                <button type="button" class="btn btn-success" style="background-color: #34DA94; border: none" data-dismiss="modal">Oke</button>
            </div>
        </div>
        </div>
    </div>



    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    @if (session('status'))
        <script>
            $(document).ready(function () {
                $('#exampleModalCenter').modal().show();
            });
        </script>
    @endif
    
</body>
</html>
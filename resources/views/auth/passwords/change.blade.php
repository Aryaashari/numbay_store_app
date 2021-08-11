<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbay Store - Ubah Password</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/daftar.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- Utilities CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/form.css') }}">

    <!-- Google Fonts (Noto Sans) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body id="daftar">

    <!-- Start Main Area -->
    <main>


        <!-- Start Arrow Area -->
        <div class="arrow-back">
            <a href="#" onclick="window.history.back()"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="arrow-back"></a>
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
                    <div class="col-12 text-center">
                        <h3>Ubah Password</h3>
                    </div>
                    <div class="col-10">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
    
                            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                                    
                            <div class="form">
                                <input class="form-control @error('old_password') is-invalid @enderror mb-2" type="old_password" name="old_password" placeholder="Masukkan password anda saat ini!" value="{{ old('old_password') }}">
                                @error('old_password')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>

                            <div class="form">
                                <input class="form-control @error('password') is-invalid @enderror mb-2" type="password" name="password" placeholder="Masukkan password baru anda!" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <b>{{ $message }}</b>
                                    </div>
                                @enderror
                            </div>

                            <div class="form">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Masukkan konfirmasi password baru anda!">
                            </div>

                            <a href="{{ url('forgot-password') }}" class="text-left mt-0 d-block" style="font-size: 14px;">Lupa Password?</a>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Ubah Password</button>
                            </div>
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



    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
        <script>
            swal("Berhasil!", "Link reset password telah dikirim ke email anda, \n Silahkan cek email anda!");
        // </script>
    @endif
    
</body>
</html>

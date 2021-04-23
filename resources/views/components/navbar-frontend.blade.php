<!-- Start Navbar Area -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt="logo numbay store"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/') ? 'aktif' : '') }}" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index2.html">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="btn btn-light">Login</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/') ? 'aktif' : '') }}" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index2.html">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link kontak" href="#">Kontak</a>
                    </li>
                </ul>
                <div class="user-whislist">
                    <div class="whislist">
                        <a href="{{ url('/wishlists') }}" class="love-icon"><img src="{{ asset('frontend/img/icon/love.png') }}" alt="love-icon"></a>
                    </div>
                    <div class="user">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('frontend/img/icon/user_sm.png') }}" width="40" alt="user-profile">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="user-profile d-flex dropdown-item align-items-center">
                                <div class="img-user" style="background-image: url({{ asset('frontend/img/icon/user_lg.png')}} );"></div>
                                <div class="text-user">
                                    <h4>Arya <br> Ashari</h4>
                                    <!-- <p>Btn.Pemda doyo baru blok G5 No 18</p> -->
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item user-menu" href="edit-user.html"><img src="{{ asset('frontend/img/icon/user_icon.png') }}" class="icon" alt="user-icon"> Edit Profile</a>
                            <a class="dropdown-item toko-menu" href="buat-toko.html"><img src="{{ asset('frontend/img/icon/toko_icon.png') }}" class="icon" alt="toko-icon"> Buka Toko</a>
                            <a class="dropdown-item logout-menu" href="index.html" data-toggle="modal" data-target="#exampleModal"><img src="{{ asset('frontend/img/icon/log-out.png') }}" class="icon" alt="logout-icon"> Keluar</a>
                        </div>
                    </div>
                </div>
            @endguest

            
        </div>
    </div>
</nav>
<!-- End Navbar Area -->
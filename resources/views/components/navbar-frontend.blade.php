<!-- Start Navbar Area -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="logo numbay store"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/') ? 'aktif' : '') }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index2.html">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="btn btn-light login">Login</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/') ? 'aktif' : '') }}" href="{{ url('/') }}">Beranda</a>
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
                            <img src="{{ asset('storage/uploads/user/'.Auth::user()->foto_profile_user) }}" width="40" alt="user-profile">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="user-profile d-flex dropdown-item align-items-center">
                                <div class="img-user" style="background-image: url({{ asset('storage/uploads/user/'.Auth::user()->foto_profile_user)}} );"></div>
                                <div class="text-user">
                                    <h4>{{ Auth::user()->nama_depan }} <br> {{ Auth::user()->nama_belakang }}</h4>
                                    <!-- <p>Btn.Pemda doyo baru blok G5 No 18</p> -->
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item user-menu" href="{{ url('/user/profile/edit') }}"><img src="{{ asset('frontend/img/icon/user_icon.png') }}" class="icon" alt="user-icon"> Edit Profile</a>

                            <a class="dropdown-item toko-menu" href="buat-toko.html"><img src="{{ asset('frontend/img/icon/toko_icon.png') }}" class="icon" alt="toko-icon"> Buka Toko</a>

                            <a class="dropdown-item logout-menu" href="index.html" data-toggle="modal" data-target="#modalKeluar"><img src="{{ asset('frontend/img/icon/log-out.png') }}" class="icon" alt="logout-icon"> Keluar</a>

                            
                        </div>
                    </div>
                </div>
            @endguest

            
        </div>
    </div>
</nav>

<!-- Modal Konfirmasi Log-out -->
<div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <h4>Yakin anda ingin keluar ?</h4>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Keluar</button>
        </form>
        </div>
    </div>
    </div>
</div>
<!-- End Navbar Area -->
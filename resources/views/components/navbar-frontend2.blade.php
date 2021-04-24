<!-- Start Navbar Area -->
<nav class="navbar nav-back-user">
    <div class="container">
        <div class="arrow-back py-2">
            <a href="#" onclick="window.history.back();"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="tombol-kembali"></a>
        </div>
        @auth

            <div class="user">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="rounded-circle" style="width: 45px; height: 45px; background-image: url({{ asset('storage/uploads/user/'.Auth::user()->foto_profile_user) }}); background-size: cover">
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="user-profile d-flex dropdown-item align-items-center">
                        <div class="img-user" style="background-image: url({{ asset('storage/uploads/user/'.Auth::user()->foto_profile_user) }});"></div>
                        <div class="text-user">
                            <h4>{{ Auth::user()->nama_depan }} <br> {{ Auth::user()->nama_belakang }}</h4>
                            <!-- <p>Btn.Pemda doyo baru blok G5 No 18</p> -->
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item user-menu" href="{{ url('/user/profile/edit') }}"><img src="{{ asset('frontend/img/icon/user_icon.png') }}" class="icon" alt="user-icon"> Edit Profil</a>
                    <a class="dropdown-item toko-menu" href="#"><img src="{{ asset('frontend/img/icon/toko_icon.png') }}" class="icon" alt="toko-icon"> Buka Toko</a>
                    <a class="dropdown-item logout-menu" href="index.html" data-toggle="modal" data-target="#modalKeluar"><img src="{{ asset('frontend/img/icon/log-out.png') }}" class="icon" alt="logout-icon"> Keluar</a>
                </div>
            </div>

        @else

            <a href="{{ url('/login') }}" class="btn btn-light login">Login</a>

        @endauth
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
<!-- End Navbar Area -->
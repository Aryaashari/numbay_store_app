<!-- Start Navbar Area -->
<nav class="navbar nav-back-user">
    <div class="container">
        <div class="arrow-back">
            <a href="#" onclick="window.history.back();"><img src="{{ asset('frontend/img/icon/arrow_back_white.png') }}" alt="tombol-kembali"></a>
        </div>
        <div class="user">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('frontend/img/icon/user_sm.png') }}" width="40" alt="user-profile">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="user-profile d-flex dropdown-item align-items-center">
                    <div class="img-user" style="background-image: url({{ asset('frontend/img/icon/user_lg.png') }});"></div>
                    <div class="text-user">
                        <h4>Arya <br> Ashari</h4>
                        <!-- <p>Btn.Pemda doyo baru blok G5 No 18</p> -->
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item user-menu" href="#"><img src="{{ asset('frontend/img/icon/user_icon.png') }}" class="icon" alt="user-icon"> Edit Profil</a>
                <a class="dropdown-item toko-menu" href="#"><img src="{{ asset('frontend/img/icon/toko_icon.png') }}" class="icon" alt="toko-icon"> Buka Toko</a>
                <a class="dropdown-item logout-menu" href="#"><img src="{{ asset('frontend/img/icon/log-out.png') }}" class="icon" alt="logout-icon"> Keluar</a>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar Area -->
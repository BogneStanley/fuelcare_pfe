<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(isset($page) and $page == "home") active @endif " aria-current="page" href="{{ route("admin.home") }}">
                    <span class="me-2" data-feather="home"><i class="fa fa-home" aria-hidden="true"></i></span>
                    Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(isset($page) and $page == "stations") active @endif" href="{{ route("admin.station") }}">
                    <span class="me-2" data-feather="file"><i class="fas fa-gas-pump"></i></span>
                    Stations
                </a>
            </li>
        </ul>

    </div>
    <div class="position-absolute bottom-0 mb-3" style="width: 100%;">
        <div class="row justify-content-center">
            <div class="fake_img"></div>
            <div class="align-self-center text-center">
                <a class="nav-link" href="{{ route("admin.profil") }}">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <br> <span style="font-size: 10px">{{ Auth::user()->email }}</span></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="text-center">
                <a class="nav-link" href="{{ route('logout') }}">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>

        </div>
    </div>
</nav>

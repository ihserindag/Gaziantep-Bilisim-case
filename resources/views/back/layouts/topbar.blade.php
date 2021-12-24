<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex me-2">
        <i class="hamburger align-self-center"></i>
    </a>



    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown ms-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
                  Hoşgeldiniz   {{ Auth::User()->name }}
                  <i class="fas fa-chevron-down"></i>

                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-user"></i> Profil</a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i>Çıkış</a>
                </div>
            </li>
        </ul>
    </div>

</nav>

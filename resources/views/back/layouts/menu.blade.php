<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="index.html">
        <svg>
            <use xlink:href="#ion-ios-pulse-strong"></use>
        </svg>
        Gaziantep Bilişim
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="{{ asset('tema') }}/img/avatars/avatar.jpg" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="fw-bold">{{ Auth::user()->name }}</div>

        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Filmler
            </li>
            <li class="sidebar-item @if(Request::segment(1)=="") active @endif">
                <a href="{{ route('index') }}" data-bs-target="#dashboards"  class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Anasayfa</span>
                </a>

            </li>
            <li class="sidebar-item @if((Request::segment(1)=="kategori") || (Request::segment(1)=="film") ) active @endif">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed ">
                    <i class="align-middle me-2 fas fa-fw fa-file"></i> <span class="align-middle">Filmler</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse @if((Request::segment(1)=="kategori") || (Request::segment(1)=="film") ) show @endif"  data-bs-parent="#sidebar">
                    <li class="sidebar-item  @if(Request::segment(1)=="film") active  @endif"><a class="sidebar-link" href="{{ route('film.index')}}">Film Lİstesi</a>
                    </li>

                    <li class="sidebar-item  @if(Request::segment(1)=="kategori") active  @endif"><a class="sidebar-link" href="{{ route('kategori.index') }}">Kategoriler</a>
                    </li>


                </ul>
            </li>


            <li class="sidebar-header">
                Kullanıcı İşlemleri
            </li>


            <li class="sidebar-item ">
                <a href="{{ route('kullanici.index') }}"  class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Kullanıcılar</span>
                </a>

            </li>











            <li class="sidebar-header">
                Profil
            </li>
            <li class="sidebar-item ">
                <a data-bs-target="#dashboards" href="{{ route('passwordchange') }}"  class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-book"></i> <span class="align-middle">Şifre Değiştir</span>
                </a>

            </li>


            <li class="sidebar-item ">
                <a data-bs-target="#dashboards" href="{{ route('logout') }}"  class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-desktop"></i> <span class="align-middle">Çıkış</span>
                </a>

            </li>


        </ul>
    </div>
</nav>

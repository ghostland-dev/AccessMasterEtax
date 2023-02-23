
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="{{ __('/') }}">
            <img src="{{ asset('logo.svg') }}"   alt="E-tax Logo " laoding="lazy" class="logo-navbar h-3" />
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>

            </ul>

            <!-- Left links -->

            <div class="d-flex align-items-center">

                @guest
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-link px-3 me-2">
                    Connexion
                </a>
                @endif

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary me-3">
                    Inscription gratuit
                </a>
                @endif
                @else


              @include('layouts.partials.sidebar')

                <!-- Right elements -->
                <div class="d-flex align-items-center">

                    <!-- Notifications -->
                    <div class="dropdown">
                        <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">{{ __(33) }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Alerte 01</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Alerte 02</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Alerte 03</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Storage::url(Auth::user()->profile) }}" class="rounded-circle logo-navbar " height="25" alt="utilisateur" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <p class="dropdown-item" href="#">{{ Auth::user()->email }}</p>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ URL('/app/v1/profil\/'). Auth::user()->role}}">Mon compte</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Paramètres</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Dossiers</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Suivi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Déconnexion') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->

                @endguest



            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">


        <!-- Toggle button -->
        <button data-collapse-toggle="navbarButton" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Collapsible wrapper -->
        <div class="  navbar-collapse" id="navbarButton">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="{{ __('/') }}">
                <img src="{{ asset('logo.svg') }}" alt="E-tax Logo " laoding="lazy" class="logo-navbar h-3" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        etapes
                    </a>

                    <ul class="dropdown-menu p-3">
                        <li class=""><a class="dropdown-item" href="{{ route('etape1') }}"> <i
                                    class="fas fa-user"></i>
                                Bienvenue</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape2') }}"> <i
                                    class="fas fa-user"></i>
                                Test
                                d'élégibilité </a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape3') }}"> <i
                                    class="fas fa-user"></i>
                                Signature
                                de contrat </a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape4') }}"> <i
                                    class="fas fa-user"></i>
                                Renvoie
                                des documents signé </a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape5') }}"> <i
                                    class="fas fa-user"></i>
                                Constitution de dossier</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape6') }}"> <i
                                    class="fas fa-user"></i>
                                Dossier
                                transmis aux douanes</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape7') }}"> <i
                                    class="fas fa-user"></i>
                                Accusé de
                                Reception douanières</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape8') }}"> <i
                                    class="fas fa-user"></i>
                                Remboursement de client</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape9') }}"> <i
                                    class="fas fa-user"></i>
                                Envoyer
                                de facture Voltaria</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape10') }}"> <i
                                    class="fas fa-user"></i>
                                Changement des taux reduits auprès de fournisseur</a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('etape10') }}"> <i
                                    class="fas fa-user"></i>
                                Finalisation de proposition d'autres services</a></li>
                    </ul>
                </li>

                <li class="   nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> Simulateurs </a>
                    <ul class="dropdown-menu p-3">

                        <li class=""><a class="dropdown-item" href="{{ route('SimulateurCSPE') }}"><i
                                    class="fas fa-book"></i>
                                Tests Eligibilité CSPE </a></li>
                        <li class=""><a class="dropdown-item" href="{{ route('SimulateurTICGN') }}"><i
                                    class="fas fa-book"></i>
                                Tests Eligibilité TCGN </a></li>

                    </ul>



                </li>


            </ul>


            <!-- Left links -->

            <div class="hidden w-full md:block md:w-auto">

                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-success m-1">
                            Connexions
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark me-3">
                            Inscription gratuit
                        </a>
                    @endif
                @else
                    @include('layouts.partials.sidebar')

                    <!-- Right elements -->
                    <div class="d-flex align-items-center">

                        <!-- Notifications -->
                        <div class="dropdown">
                            <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#"
                                id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span
                                    class="badge rounded-pill badge-notification bg-danger">{{ count($modelData) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($modelData as $data)
                                    <li class="bg-light shadow ">

                                        <div class="dropdown-item">
                                            <h5 class="  ">{{ $data->nom_alerte }} </h5>
                                            <p class=" ">{{ $data->description_alerte }} </p>
                                        </div>
                                    </li>
                                    <!-- display the data -->
                                @endforeach


                            </ul>
                        </div>
                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ Auth::user()->profile }}" class="rounded-circle logo-navbar "
                                    height="25" alt="utilisateur" loading="lazy" />
                                {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd14Txv031zmnOdB79hQpF03Vih_bR3e3ccvgiRQWe-_UUkV1cBMychdcfU1602SpaDe4&usqp=CAU"
                                    class="rounded-circle logo-navbar " height="25" alt="utilisateur"
                                    loading="lazy" /> --}}
                            </a>


                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li class="">
                                    <p class="dropdown-item" href="#"> {{ Auth::user()->email }}</p>
                                </li>
                                <li class="">
                                    <a class="dropdown-item"
                                        href="{{ URL('/app/v1/profil\/') . Auth::user()->role }}">Mon
                                        compte</a>
                                </li>
                                <li class="">
                                    <a class="dropdown-item" href="#">Paramètres</a>
                                </li>
                                <li class="">
                                    <a class="dropdown-item" href="#">Dossiers</a>
                                </li>
                                <li class="">
                                    <a class="dropdown-item" href="#">Suivi</a>
                                </li>
                                <li class="">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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
<section id="loading">
    <div id="loading-content"></div>
</section>

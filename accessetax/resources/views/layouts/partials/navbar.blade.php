 <header class="app-header">
     <nav class="navbar navbar-expand-lg navbar-light">
         <ul class="navbar-nav">
             <li class="nav-item d-block d-xl-none">
                 <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="headerCollapse">
                     <i class="ti ti-menu-2"></i>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link nav-icon-hover bg-success  " href="{{ route('alertes') }}">
                     <i class="ti ti-bell-ringing text-dark "></i>

                 </a>
             </li>
         </ul>
         <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
             <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                 <a href="{{ route('etape1') }}" target="_blank" class="btn btn-success">Nouveau client <i
                         class="fa-"></i></a>
                 <button type="button" class="btn btn-dark mx-3" data-toggle="collapse" data-target="#sidebar"><i
                         class="fa fa-dashboard  "></i> Menu</button>
                 <li class="nav-item dropdown">
                     <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         <img src="{{ asset('images/profile/user-1.jpg') }}" alt="" width="35"
                             height="35" class="rounded-circle">
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                         <div class="message-body">
                             <a href="{{ URL('/app/v1/profil\/') . Auth::user()->role }}"
                                 class="d-flex align-items-center gap-2 dropdown-item">
                                 <i class="ti ti-user fs-6"></i>
                                 <p class="mb-0 fs-3">mon compte</p>
                             </a>
                             <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                 <i class="ti ti-mail fs-6"></i>
                                 <p class="mb-0 fs-3">Mes dossiers</p>
                             </a>
                             <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                 <i class="ti ti-list-check fs-6"></i>
                                 <p class="mb-0 fs-3">Notifications</p>
                             </a>
                             <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                 class=" btn btn-outline-primary mx-3 mt-2 d-block">
                                 Déconnexion</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                         </div>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
 </header>

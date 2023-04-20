 <!-- Sidebar Start -->
 <aside class="left-sidebar ">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-center">
             <a href="{{ route('home') }}" class="text-nowrap logo-img">
                 <img src="{{ asset('logo.svg') }}" width="120" alt="" />
             </a>
             <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                 <i class="text-success ti ti-x fs-8"></i>
             </div>
         </div>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav scroll-sidebar" data-simplebar="">

             <div class="unlimited-access hide-menu bg-light-success position-relative mb-7 mt-1 rounded">
                 <div class="d-flex">
                     <div class="unlimited-access-title me-3">
                         <p class="fw-semibold fs-4 mb-4 text-success w-85"> Pochette </p>
                         <a href="#" target="_blank" class="btn btn-success fs-2 fw-semibold lh-sm w-100">
                             {{ '0.0' }} €</a>
                     </div>
                     <div class="unlimited-access-img m-1">
                         <img src="{{ asset('images/backgrounds/rocket.png') }}" alt="budget" class="img-fluid">
                     </div>
                 </div>
             </div>
             <ul id="sidebarnav">
                 <li class="nav-small-cap">
                     <i class="text-success ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu text-success">Accueil</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ URL('/app/v1/profil\/') . Auth::user()->role }}"
                         aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-layout-dashboard text-success"></i>
                         </span>
                         <span class="hide-menu">Tableau de bord</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="text-success ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu text-success">Gestion</span>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('utilisateurs') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Utilisateurs</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('taxReds') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Taux Réduits</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('refundBoards') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Tableau de remboursement</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('companies') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Entreprises</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('sites') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Sites</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('refundCspes') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Remboursements CSPES</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('refundTcgns') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Remboursements TCGIN</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('elecMeters') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Compteur Electrcité</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('gazMeters') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Compteurs Gaz</span>
                     </a>
                 </li>



                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('contractGazs') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Contacts Gaz</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('contractElecs') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Contacts Electrcité</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('genFolds') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Dossier Générées</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('baseFolers') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Dossier Bases</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('studies') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Etudes</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('billGazs') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Factures Gaz</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('billsElecs') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-article"></i>
                         </span>
                         <span class="hide-menu">Factures Electrcité</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('alertes') }}" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-alert-circle"></i>
                         </span>
                         <span class="hide-menu">Alerts</span>
                     </a>
                 </li>
                 {{-- <li class="sidebar-item">
                     <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-cards"></i>
                         </span>
                         <span class="hide-menu">Card</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-file-description"></i>
                         </span>
                         <span class="hide-menu">Forms</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-typography"></i>
                         </span>
                         <span class="hide-menu">Typography</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="text-success ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">AUTH</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-login"></i>
                         </span>
                         <span class="hide-menu">Login</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-user-plus"></i>
                         </span>
                         <span class="hide-menu">Register</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="text-success ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">EXTRA</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-mood-happy"></i>
                         </span>
                         <span class="hide-menu">Icons</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                         <span>
                             <i class="text-success ti ti-aperture"></i>
                         </span>
                         <span class="hide-menu">Sample Page</span>
                     </a>
                 </li> --}}


             </ul>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->

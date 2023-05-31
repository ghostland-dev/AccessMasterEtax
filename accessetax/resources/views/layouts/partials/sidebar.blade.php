 <!-- Sidebar Start -->
 <aside id="sidebar" class=" bg-emerald-400
  left-sidebar ">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-center">
             <a href="{{ route('home') }}" class="text-nowrap logo-img">
                 <img src="{{ asset('logo.svg') }}" width="120" alt="" />
             </a>
             <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                 <i class="text-success fa fa-x fs-8"></i>
             </div>
         </div>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav scroll-sidebar" data-simplebar="">

             <div class="unlimited-access hide-menu bg-light position-relative mb-7 mt-1 rounded">
                 <div class=" ">
                     <div
                         class="unlimited-access-title text-center d-flex justify-content-around align-content-center ">
                         <div>
                             <p class="fw-semibold fs-4 mb-4 text-success w-85"> Pochette </p>
                             <a href="#" target="_blank" class="btn btn-success fs-3 fw-bolder   w-100 ">
                                 {{ '3526.0' }} €</a>

                         </div>

                     </div>

                 </div>
             </div>
             <ul id="sidebarnav">
                 <li class="nav-small-cap">
                     <i class="text-success fa fa-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu text-success">Accueil</span>
                 </li>
                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ URL('/app/v1/profil\/') . Auth::user()->role }}"
                         aria-expanded="true">
                         <span>
                             <i class="text-success ti ti-layout-dashboard text-success"></i>
                         </span>
                         <span class="hide-menu">Tableau de bord</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="text-success fa fa-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu text-success">Gestion</span>
                 </li>

                 {{-- ---------------------- Route des utilisateurs -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('utilisateurs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-user"></i>
                         </span>
                         <span class="hide-menu">Utilisateurs</span>
                     </a>
                 </li>


                 {{-- ---------------------- Route des Codes d'activités-------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('activityCodes') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Codes d'activités</span>
                     </a>
                 </li>


                 {{-- ---------------------- Route des Codes NAF -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('codesNafs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Codes NAF</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des fuites carbons ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('fuitcarbons') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-circle"></i>
                         </span>
                         <span class="hide-menu">Fuites Carbon</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des constants ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('constants') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-add"></i>
                         </span>
                         <span class="hide-menu">Constants</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des Bureau des douanes ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('douanes') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu">Bureau des douanes</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des Eligibilité de CSPE------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('cspeEligs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu">Eligibilité CSPE</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des eLIGIBILIT2 DE TICGN ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('tcgnEligs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu">Eligibilité TICGN</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des parameters ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('parameters') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu">Paramètres</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des  Primitres des compteurs ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('premMeters') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu">Primitres des compteurs</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des responsables------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('responsibles') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu"> Des dirigéants</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des Fournisseurs ------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('suppliers') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-house"></i>
                         </span>
                         <span class="hide-menu"> Fournisseurs</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des taux réduits -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('taxReds') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Taux Réduits</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des tableau de remboursement -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('refundBoards') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Tableau de remboursement</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des entreprises -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('companies') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Entreprises</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des sites -------------------------------- --}}
                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('sites') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Sites</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des Remboursement CSPE -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('refundCspes') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Remboursements CSPES</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des remboursement TICGN -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('refundTcgns') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Remboursements TCGIN</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des Compteurs Electrctriques -------------------------------- --}}
                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('elecMeters') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Compteur Electrcité</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des compteurs Gaz -------------------------------- --}}
                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('gazMeters') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Compteurs Gaz</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des contrats gaz -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('contractGazs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Contacts Gaz</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des Contrat Elecs -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('contractElecs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Contacts Electrcité</span>
                     </a>
                 </li>

                 {{-- ---------------------- Route des Dossiers générés  -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('genFolds') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Dossier Générées</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des dossier de base -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('baseFolers') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Dossier Bases</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des documents de base -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('baseDocs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Documents de Bases</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des etudes -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('studies') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Etudes</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des factures de gaz -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('billGazs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Factures Gaz</span>
                     </a>
                 </li>
                 {{-- ---------------------- Route des factures d'éléctrcité -------------------------------- --}}

                 <li class="sidebar-item bg-light rounded-4">
                     <a class="sidebar-link" href="{{ route('billsElecs') }}" aria-expanded="true">
                         <span>
                             <i class="text-success fa fa-file"></i>
                         </span>
                         <span class="hide-menu">Factures Electrcité</span>
                     </a>
                 </li>



             </ul>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->

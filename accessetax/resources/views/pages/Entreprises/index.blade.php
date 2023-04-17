@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                    <!--  Body Wrapper -->
                    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
                        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

                        @include('layouts.partials.sidebar')
                        <!--  Main wrapper -->
                        <div class="body-wrapper">
                            <!--  Header Start -->
                            @include('layouts.partials.navbar')

                            <!--  Header End -->
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="container mt-5 pt-4">
                                            <div class="row align-items-end mb-4 pb-2">
                                                <div class="col-md-8">
                                                    <div class="section-title text-center text-md-start">
                                                        <h6 class="title mb-4 text-success">+ liste des societés </h6>
                                                        <p class="text-muted mb-0 para-desc">Start work with Leaping. Build
                                                            responsive, mobile-first projects on the web with the world's
                                                            most popular front-end component library.</p>
                                                    </div>



                                                    <button class="btn btn-primary " data-bs-target="#exampleModalToggle"
                                                        data-bs-toggle="modal"> + Nouvelle Societé</button>

                                                    <!--end col--> 
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
                                                    <div class="text-center text-md-end">
                                                        <a href="page-jobs.html" class="text-primary">Voir plus d'etudes
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-arrow-right fea icon-sm">
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                            </svg></a>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->

                                            <div class="row">
                                                @foreach ($entreprises as $entreprise)
                                                    <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2">
                                                        <div class="card border-0 bg-light rounded shadow">
                                                            <div class="card-body p-4">
                                                                <div class="flex justify-between h2-margin">
                                                                    <h4 class="text-center text-success">Informations
                                                                        Juridiques de PEPPER HOT'</h4>
                                                                    <div class="generate-contract-mentions"><a
                                                                            href="#" class="tooltip"> <span
                                                                                class="tooltiptext ttt-left ttt-bottom">Générer
                                                                                les mentions
                                                                                pour
                                                                                contrats</span></a>
                                                                        <div class="el-overlay"
                                                                            style="z-index: 2003; display: none;">
                                                                            <div role="dialog" aria-modal="true"
                                                                                aria-labelledby="el-id-8858-4"
                                                                                aria-describedby="el-id-8858-5"
                                                                                class="el-overlay-dialog"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content grow column">
                                                                    <table class="grow">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th class="text-muted">SIREN :</th>
                                                                                <td>844 766 527 <span
                                                                                        class="far fa-copy clipboard"
                                                                                        style="margin-left: 6px;"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">SIRET (siège) :</th>
                                                                                <td>844 766 527 00015 <span
                                                                                        class="far fa-copy clipboard"
                                                                                        style="margin-left: 6px;"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">Forme juridique :
                                                                                </th>
                                                                                <td>EURL, entreprise unipersonnelle à
                                                                                    responsabilité
                                                                                    limitée</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">Numéro de TVA:</th>
                                                                                <td class="flex items-center">
                                                                                    <div><span>FR90844766527</span><span
                                                                                            class="far fa-copy clipboard"
                                                                                            style="margin-left: 6px;"></span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">Inscription au RCS :
                                                                                </th>
                                                                                <td><span class="actif">INSCRIT <i
                                                                                            class="far fa-check-circle"></i></span>
                                                                                    (au greffe de RENNES, le 20/12/2018)
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">Numéro RCS :</th>
                                                                                <td>844 766 527 R.C.S. Rennes <span
                                                                                        class="far fa-copy clipboard"
                                                                                        style="margin-left: 6px;"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-muted">Capital social :</th>
                                                                                <td>5 000,00 €</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="d-flex gap-2"><a class="btn btn-success"
                                                                            target="_blank" rel="noopener"
                                                                            href="https://api.avis-situation-sirene.insee.fr/identification/pdf/84476652700015"><i
                                                                                class="fas fa-file-download"></i>
                                                                            Avis de situation SIRENE
                                                                        </a><a class="btn btn-success" href="#"
                                                                            target="_blank" rel="noopener"><i
                                                                                class="fas fa-file-download"></i>
                                                                            Extrait INPI
                                                                        </a><a
                                                                            href="pepper-hot-844766527/PEPPER%20HOT%27 - Extrait d'immatriculation.pdf"
                                                                            class="btn btn-success" target="_blank"
                                                                            rel="nofollow"><i
                                                                                class="fas fa-file-download"></i>
                                                                            Extrait Pappers
                                                                        </a></div>
                                                                </div>

                                                                {{-- Dates of start and end --}}

                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!--end col-->
                                                @endforeach


                                                <div class="col-12 mt-4 pt-2 d-block d-md-none text-center">
                                                    <a href="#" class="btn btn-primary">View more Jobs <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-arrow-right fea icon-sm">
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12"></line>
                                                            <polyline points="12 5 19 12 12 19"></polyline>
                                                        </svg></a>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

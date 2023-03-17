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
                                                        <h4 class="title mb-4">Liste des etudes </h4>
                                                        <p class="text-muted mb-0 para-desc">Start work with Leaping. Build
                                                            responsive, mobile-first projects on
                                                            the web with the world's most popular front-end component
                                                            library.</p>
                                                    </div>


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

                                                @foreach ($etudes as $etude)
                                                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                                                        <div class="card border-0 bg-light rounded shadow">
                                                            <div class="card-body p-4">
                                                                <span
                                                                    class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">
                                                                    {{ $etude->nom_etude }}</span>
                                                                <h5>{{ $etude->nom_client }}</h5>
                                                                <div class="mt-3">
                                                                    <span class="text-muted d-block"><i class="fa fa-home"
                                                                            aria-hidden="true"></i> <a href="#"
                                                                            target="_blank"
                                                                            class="text-muted">{{ $etude->nom_responsable }}</a></span>
                                                                    <span class="text-muted d-block"><i
                                                                            class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        {{ $etude->nom_contact }}</span>

                                                                    <span class="text-muted badge badge-primary"><i
                                                                            class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        {{ $etude->date_debut }}</span>
                                                                    <span class="text-muted badge badge-primary"><i
                                                                            class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        {{ $etude->date_fin }}</span>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <a href="#"
                                                                        class=" btn btn-outline-primary">Listes des
                                                                        dossiers</a>
                                                                    <a href="#"
                                                                        class="btn btn-outline-warning">Acutualité</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                @endforeach


                                                <div class="col-12 mt-4 pt-2 d-block d-md-none text-center">
                                                    <a href="#" class="btn btn-primary">View more Jobs <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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

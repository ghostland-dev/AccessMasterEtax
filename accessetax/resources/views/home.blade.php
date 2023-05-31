@extends('layouts.app')

@section('content')
    <div class="container-fluid h-screen">
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

                                        <section class="pt-8 pt-md-9">
                                            <div class="container">

                                                <!-- Categories -->
                                                <div class="row mt-6">
                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('genFolds') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-folder fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Dossiers
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('genFolds') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-calendar fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Rendez-vous
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('contacts') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-user fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Contacts
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('genFolds') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-user fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Messages
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('companies') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-house fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Societés
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('studies') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-graduation-cap fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Etudes
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('genFolds') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-user fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Facturation
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="col-md-3 mb-4">
                                                        <a href="{{ route('genFolds') }}"
                                                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                                                            <span
                                                                class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                                                <i class="fa fa-external-link-square fa-2x "></i>
                                                            </span>
                                                            <span class="text-dark mt-3">
                                                                Autres
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

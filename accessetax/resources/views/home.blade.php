@extends('layouts.signed')

@section('main')
    <div class="container-fluid  ">
        <div class="card">
            <div class="card-body bg-slate-100">


                <!-- Categories -->
                <div class="row mt-6  ">
                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700 ">
                        <a href="{{ route('genFolds') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-folder fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Dossiers
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('genFolds') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-calendar fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Rendez-vous
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('contacts') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-user fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Contacts
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('genFolds') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-user fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Messages
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('companies') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-house fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Societés
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('studies') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-graduation-cap fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Etudes
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('genFolds') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-user fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Facturation
                            </span>
                        </a>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3 mb-4 transition-all transform hover:scale-110 duration-700  ">
                        <a href="{{ route('genFolds') }}"
                            class="card align-items-center text-decoration-none border-0 hover-lift-light py-4 hover:bg-slate-600 hover:text-white">
                            <span class="icon-circle icon-circle-lg bg-pastel-success text-success">
                                <i class="fa fa-external-link-square fa-2x "></i>
                            </span>
                            <span class="  mt-3">
                                Autres
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

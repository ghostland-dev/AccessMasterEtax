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
                                            <div class="alert bg-light-success text-success text-center" role="alert">
                                                <i class="fa fa-trash"></i> {{ session('status') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('activityCode.update', $codeActivite->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            <h4 class="text-gray-300 text-center my-3 bg-slate-50 p-3 rounded-md w-full   ">
                                                mettre à jour le code d'activité </h4>

                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text"
                                                            id="code_naf"value="{{ $codeActivite->code_naf }}"
                                                            name="code_naf" class="form-control" />
                                                        <label class="form-label" for="code_naf">Code NAF</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text"
                                                            id="libelle_naf"value="{{ $codeActivite->libelle_naf }}"
                                                            name="libelle_naf" class="form-control" />
                                                        <label class="form-label" for="libelle_naf">Description NAF</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="code_nace"
                                                            value="{{ $codeActivite->code_nace }}" name="code_nace"
                                                            class="form-control" />
                                                        <label class="form-label" for="code_nace">Code Nace</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text"
                                                            id="libelle_nace"value="{{ $codeActivite->libelle_nace }}"
                                                            name="libelle_nace" class="form-control" />
                                                        <label class="form-label" for="libelle_nace">Description
                                                            NACE</label>
                                                    </div>
                                                </div>
                                            </div>





                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-dark btn-block mb-4">Mettre à
                                                jour</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

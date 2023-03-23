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
                                        <table class="table align-middle   mb-0 bg-white">
                                            <a type="button" class="btn btn-success m-3 ">
                                                + Nouveau FactureElec
                                            </a>
                                            <thead class="bg-light   ">
                                                <tr class="text-align-center">
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>N° Facture</th>
                                                    <th>Fournisseur</th>
                                                    <th>Consommation</th>
                                                    <th>Période </th>
                                                    <th>Année </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($FacturesElec as $FactureElec)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault" />
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        {{ $FactureElec->numero_facture }}</p>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        <span class=" ">
                                                                            {{ $FactureElec->fournisseur }} </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        <span class="btn btn-dark disabled">
                                                                            {{ $FactureElec->consommation }} €/kw</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="bg-light text-center">
                                                            <p class="text-muted mb-0">
                                                                <span class="text-success">
                                                                    {{ $FactureElec->date_debut }}</span>
                                                            </p>
                                                            <p class="text-muted mb-0">
                                                                <span class="text-danger">
                                                                    {{ $FactureElec->date_fin }}</span>
                                                            </p>
                                                        </td>

                                                        <td>{{ $FactureElec->annee }}</td>
                                                        <td>
                                                            <a href="{{ $FactureElec->fichier }}"
                                                                class="btn btn-dark btn-sm btn-rounded" download> <i
                                                                    class="fas fa-download"></i> </a>
                                                            <a href="#" class="btn btn-primary btn-sm btn-rounded"> <i
                                                                    class="fas fa-pen"></i> </a>
                                                            <a href="#" class="btn btn-danger btn-sm btn-rounded"> <i
                                                                    class="fas fa-trash"></i> </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

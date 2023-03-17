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
                                        <table class="table align-middle mb-0 bg-white">
                                            <button type="button" class="btn btn-info m-3 ">
                                                + Nouveau fournisseur
                                            </button>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>Fournisseur</th>
                                                    <th>Contact</th>
                                                    <th>SIREN</th>
                                                    <th>Adresse</th>
                                                    <th>Energie</th>
                                                    <th>Date Inscription </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fournisseurs as $fournisseur)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault" />
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $fournisseur->logo }}" alt=""
                                                                    style="width: 45px; height: 45px"
                                                                    class="rounded-circle" />
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        {{ $fournisseur->nom_fournisseur }}</p>
                                                                    <p class="text-muted mb-0">{{ $fournisseur->contact }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1"> <i class="fas fa-phone"></i>
                                                                        {{ $fournisseur->tel }}</p>
                                                                    <p class="text-muted mb-0"><b>E-mail</b>
                                                                        {{ $fournisseur->email }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0">{{ $fournisseur->siret }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0">{{ $fournisseur->address }}</p>
                                                            <p class="text-muted mb-0">
                                                                {{ $fournisseur->city . ' | ' . $fournisseur->zip_code }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="badge badge-info rounded-pill d-inline {{ $fournisseur->fournisseur_electrcite ? '' : 'd-none' }}">
                                                                {{ $fournisseur->fournisseur_electrcite ? 'Electrcité' : '' }}
                                                            </p>
                                                            <p
                                                                class="badge badge-warning rounded-pill d-inline {{ $fournisseur->fournisseur_gaz ? '' : 'd-none' }}">
                                                                {{ $fournisseur->fournisseur_gaz ? 'Gaz' : '' }}</p>
                                                        </td>
                                                        <td>{{ $fournisseur->created_at }}</td>
                                                        <td>
                                                            <a href="button" class="btn btn-primary btn-sm btn-rounded"> <i
                                                                    class="fas fa-pen"></i> </a>
                                                            <a href="button" class="btn btn-danger btn-sm btn-rounded"> <i
                                                                    class="fas fa-trash"></i> </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h5 class="card-title fw-semibold mb-4">une page simple</h5>
                                        <p class="mb-0">Cesi est une page simple </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

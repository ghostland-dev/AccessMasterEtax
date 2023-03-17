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
                                            <a type="button" class="btn btn-success m-3 ">
                                                + Nouveau site
                                            </a>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>site</th>
                                                    <th>Adresse</th>
                                                    <th>Contact</th>
                                                    <th>Consommation</th>
                                                    <th>Date Inscription </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sites as $site)
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
                                                                    <p class="fw-bold mb-1">{{ $site->nom }}</p>
                                                                    <p class="text-muted mb-0">{{ $site->siret }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1"> <i class="fas fa-map"></i>
                                                                        {{ $site->adresse }}</p>
                                                                    <p class="text-muted mb-0">
                                                                        {{ $site->ville . ' | ' . $site->code_postal . ' | ' . $site->pays }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0">{{ $site->telephone }}</p>
                                                            <p class="text-muted mb-0">{{ $site->email }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0"><i class="fas fa-plug"></i>
                                                                {{ $site->consommation_electrcite }}</p>
                                                            <p class="text-muted mb-0"><i class="fas fa-fire"></i>
                                                                {{ $site->consommation_gaz }}</p>
                                                        </td>

                                                        <td>{{ $site->created_at }}</td>
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

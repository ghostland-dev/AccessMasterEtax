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



                                        <a class="btn btn-primary my-4" href="{{ route('cspeElig.create') }}"> + Nouveau
                                            Test d'Eligibilité CSPE</a>
                                        <table class="table align-middle mb-0 bg-white">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>

                                                    <th>Valeur ajoutée</th>
                                                    <th>C.A.R GAZ</th>
                                                    <th>C.A.R ELec</th>
                                                    <th>C.A.R Autre</th>
                                                    <th>Valeur production</th>
                                                    <th>Achat Prod Gaz</th>
                                                    <th>Achat Prod pétrol</th>
                                                    <th>Achat Autres Prod</th>
                                                    <th>Eligibilité</th>
                                                    <th>Date création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($remboursementTCGNs as $remboursementTICGN)
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
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->valuer_ajoutee }}</p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->car_gaz }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->car_elec }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->car_autre }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class=" btn btn-light-primary text-primary">
                                                                        {{ $remboursementTICGN->valeur_production }} €
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="btn btn-light-primary text-primary">
                                                                        {{ $remboursementTICGN->achat_prod_gaz }} €</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->achat_prod_petrol }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->achat_chatleur }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->achat_autres_prod }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0">
                                                                        {{ $remboursementTICGN->eligibilite }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>



                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success dropdown-toggle"
                                                                    type="button"
                                                                    id="actionsDropdown{{ $remboursementTICGN->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="actionsDropdown{{ $remboursementTICGN->id }}">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('cspeElig.show', $remboursementTICGN->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-eye"></i>
                                                                            Détails</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('cspeElig.edit', $remboursementTICGN->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-pen"></i>
                                                                            Modifier</a></li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('cspeElig.destroy', $remboursementTICGN->id) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item"><i
                                                                                    class="fa fa-trash"></i>
                                                                                Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>

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

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
                                            <a href="{{ route('billsElec.create') }}" class="btn btn-success m-3 ">
                                                + Nouvelle facture d'éléctrcité
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
                                                            <div class="d-flex align-items-start">

                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        {{ $FactureElec->numero_facture }}</p>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-start">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1">
                                                                        <span class=" ">
                                                                            {{ $FactureElec->fournisseur }} </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-start">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold  my-2">
                                                                        <span
                                                                            class="bg-light  px-3 py-2 text-bold  rounded-2 text-success">
                                                                            {{ $FactureElec->consommation }} €/kw</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="   text-center">
                                                            <p class="text-muted mb-0">
                                                                <span class="text-light ">
                                                                    <p class="fw-bold  my-2">
                                                                        <span
                                                                            class="text-danger bg-light  my-2  px-3 py-2 text-bold  rounded-2">
                                                                            {{ $FactureElec->date_debut }} </span> <i
                                                                            class="fa fa-arrow-right"></i>
                                                                        <span
                                                                            class="text-success bg-light  my-2 px-3 py-2 text-bold  rounded-2">
                                                                            {{ $FactureElec->date_fin }}</span>
                                                                    </p>
                                                                </span>
                                                            </p>

                                                        </td>

                                                        <td>{{ $FactureElec->annee }}</td>
                                                        <td>
                                                            <a class="btn btn-dark" href="{{ $FactureElec->fichier }}"><i
                                                                    class="fa fa-download text-white"></i></a>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success dropdown-toggle"
                                                                    type="button"
                                                                    id="actionsDropdown{{ $FactureElec->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="actionsDropdown{{ $FactureElec->id }}">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('billsElec.show', $FactureElec->id) }}"
                                                                            rel="noopener noreferrer"><i
                                                                                class="fa fa-eye"></i>
                                                                            Détails</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('billsElec.edit', $FactureElec->id) }}"
                                                                            rel="noopener noreferrer"><i
                                                                                class="fa fa-pen"></i>
                                                                            Modifier</a></li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('billsElec.destroy', $FactureElec->id) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item"><i
                                                                                    class="fa fa-trash"></i>
                                                                                Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>

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

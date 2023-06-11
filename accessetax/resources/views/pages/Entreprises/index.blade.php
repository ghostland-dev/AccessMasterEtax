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
                                            <a href="{{ route('companie.create') }}" class="btn btn-success m-3 ">
                                                + Nouveau entreprise
                                            </a>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>entreprise</th>
                                                    <th>Adresse</th>
                                                    <th>NAF/NACE</th>
                                                    <th>Consommation</th>
                                                    <th>Date Inscription </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($entreprises as $entreprise)
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
                                                                    <p class="fw-bold mb-1">{{ $entreprise->denomination }}
                                                                    </p>
                                                                    <p class="text-muted mb-0">{{ $entreprise->siren }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1"> <i
                                                                            class="mx-2 fas fa-marker text-emerald-400"></i>
                                                                        {{ $entreprise->adresse }}</p>
                                                                    {{ $entreprise->ville . ' , ' . $entreprise->code_postal }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0"> {{ $entreprise->code_naf }}
                                                            </p>
                                                            <p class="text-muted mb-0"> {{ $entreprise->code_nace }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0">
                                                                {{ $entreprise->consommation_electrcite }} Mkw/€</p>
                                                            <p class="text-muted mb-0">
                                                                {{ $entreprise->consommation_gaz }} Mkw/€</p>
                                                        </td>

                                                        <td>{{ $entreprise->created_at }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success dropdown-toggle"
                                                                    type="button"
                                                                    id="actionsDropdown{{ $entreprise->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="actionsDropdown{{ $entreprise->id }}">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('companie.show', $entreprise->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-eye"></i>
                                                                            Détails</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('companie.edit', $entreprise->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-pen"></i>
                                                                            Modifier</a></li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('companie.destroy', $entreprise->id) }}">
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

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

                                        <div class="py-8">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                                    <div class="p-6 bg-white border-b border-gray-200">

                                                        <h5
                                                            class="bg-slate-500 text-center p-2 rounded-2  text-white  m-3 wow">
                                                            <i
                                                                class="fa fa-search bg-light text-emerald-400 rounded-full p-2 mx-2"></i>
                                                            Chercher une entreprise
                                                        </h5>
                                                        <form action="{{ route('company.search') }}" method="GET">
                                                            @csrf
                                                            @method('GET')
                                                            <div class="flex items-center">
                                                                <input type="text" name="query"
                                                                    class="w-full border rounded py-2 px-3 mr-2 text-sm"
                                                                    placeholder="Chercher une entreprise par SIREN, dénomination, Date de création, code NAF..."
                                                                    required>
                                                                <button type="submit"
                                                                    class="bg-emerald-400 hover:bg-emerald-400 text-white font-bold py-2 px-4 rounded">Chercher</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                                    <th>contact</th>
                                                    <th>Statut</th>
                                                    <th>NAF/NACE</th>
                                                    <th>Capital</th>
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
                                                                    <p class="fw-bold mb-1">
                                                                        <i class="mx-2 fas fa-home text-emerald-400"></i>
                                                                        {{ $entreprise->denomination }}
                                                                    </p>
                                                                    <p class="text-emerald-400  mb-0">
                                                                        <i class="mx-2 fas fa-code text-emerald-400"></i>
                                                                        {{ $entreprise->siren }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1"> <i
                                                                            class="mx-2 fas fa-phone text-emerald-400"></i>
                                                                        {{ $entreprise->tel }}

                                                                    </p>
                                                                    <p class="fw-bold mb-1"> <i
                                                                            class="mx-2 fas fa-envelope text-emerald-400"></i>
                                                                        {{ $entreprise->email }}

                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p
                                                                        class="fw-bold mb-1 rounded-md p-2  {{ $entreprise->date_radiation == null ? 'bg-emerald-50 text-emerald-400' : 'bg-red-50 text-red-400' }}">
                                                                        {{ $entreprise->date_radiation == null ? 'En activité' : 'Radiée' }}

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
                                                                {{ $entreprise->capital }} €</p>

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

                                        <div class="mt-4">
                                            {{ $entreprises->links('vendor.pagination.tailwind') }}
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

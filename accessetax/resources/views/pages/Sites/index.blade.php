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
                                            <a href="{{ route('site.create') }}" class="btn btn-success m-3 ">
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
                                                                    <p class="fw-bold mb-1"> <i
                                                                            class="mx-2 fas fa-marker text-emerald-400"></i>
                                                                        {{ $site->adresse }}</p>
                                                                    <p class="text-muted mb-0">
                                                                        {{ $site->ville . ' | ' . $site->code_postal . ' | ' . $site->pays }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0"><i
                                                                    class="mx-2 fas fa-mobile text-emerald-400"></i>{{ $site->telephone }}
                                                            </p>
                                                            <p class="text-muted mb-0"><i
                                                                    class="mx-2 fas fa-mail text-emerald-400"></i>{{ $site->email }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0"><i
                                                                    class="mx-2 fas fa-plug text-emerald-400"></i>
                                                                {{ $site->consommation_electrcite }} Mkw/€</p>
                                                            <p class="text-muted mb-0"><i
                                                                    class="mx-2 fas fa-fire text-emerald-400"></i>
                                                                {{ $site->consommation_gaz }} Mkw/€</p>
                                                        </td>

                                                        <td>{{ $site->created_at }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success dropdown-toggle"
                                                                    type="button" id="actionsDropdown{{ $site->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="actionsDropdown{{ $site->id }}">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('site.show', $site->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-eye"></i>
                                                                            Détails</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('site.edit', $site->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-pen"></i>
                                                                            Modifier</a></li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('site.destroy', $site->id) }}">
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
                                            {{ $sites->links('vendor.pagination.tailwind') }}
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

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



                                        <a class="btn btn-success my-4" href="{{ route('codesNaf.create') }}"> + Nouveau
                                            codenaf NAF</a>
                                        <table class="table align-middle mb-0 bg-white">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>Code Naf</th>
                                                    <th>Description</th>
                                                    <th>Eligible</th>
                                                    <th>Date création</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($codenafs as $codenaf)
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
                                                                        {{ $codenaf->code_naf }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="text-muted mb-0"> {{ $codenaf->libelle_naf }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="text-center   {{ $codenaf->eligible ? 'bg-emerald-50 text-emerald-400 p-3 rounded-md' : 'bg-red-50 text-red-400 p-3 rounded-md' }}">
                                                                {{ $codenaf->eligible ? 'Oui' : 'Non' }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-center ">

                                                                {{ $codenaf->created_at }}

                                                            </p>
                                                        </td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success dropdown-toggle"
                                                                    type="button" id="actionsDropdown{{ $codenaf->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="actionsDropdown{{ $codenaf->id }}">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('codesNaf.show', $codenaf->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-eye"></i>
                                                                            Détails</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('codesNaf.edit', $codenaf->id) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-pen"></i>
                                                                            Modifier</a></li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('codesNaf.destroy', $codenaf->id) }}">
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

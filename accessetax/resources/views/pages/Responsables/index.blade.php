@extends('layouts.signed')
@section('main')
    <div class="container">

        <a class="btn btn-dark my-3  " href="{{ route('responsible.create') }}"> + Nouveau Responsable</a>

        <div class="row">

            @foreach ($responsables as $responsable)
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-muted dropdown-toggle font-size-16 bg-dark text-white p-2 rounded-4 mx-2"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i
                                        class="fa fa-cog"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item"
                                        href="{{ route('responsible.show', $responsable->id) }}">Détails</a>
                                    <a class="dropdown-item"
                                        href="{{ route('responsible.edit', $responsable->id) }}">Editer</a>

                                    <form method="POST" action="{{ route('responsible.destroy', $responsable->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                            Supprimer</button>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                        class="avatar-md rounded-circle img-thumbnail col-md-3" />
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-success">
                                            {{ $responsable->civilite }}
                                            {{ $responsable->nom_famille }}
                                            {{ $responsable->prenom }}</a>
                                    </h5>
                                </div>

                                <div class="flex-1 ms-3  ">

                                    <span class="badge badge-soft-success mb-0">{{ $responsable->function }}</span>
                                </div>
                            </div>
                            <div class="my-2 p-2 card bg-light-gray">
                                <p class="text-muted mb-0"><i
                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
                                    {{ $responsable->fax }}
                                </p>
                                <p class="text-muted mb-0"><i
                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
                                    {{ $responsable->mobile }}
                                </p>
                                <p class="text-muted mb-0 mt-2"><i
                                        class="mdi mdi-email font-size-15 align-middle pe-2 text-primary"></i>
                                    {{ $responsable->email }}
                                </p>
                                <p class="text-muted mb-0 mt-2"><i
                                        class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                                    {{ $responsable->adresse }}
                                </p>
                            </div>
                            <div class="d-flex gap-2 pt-4">
                                <a href="mailto:{{ $responsable->email }}" class="btn btn-success btn-sm w-50"><i
                                        class="fa fa-mail  me-1"></i>Mailer</a>
                                <a href="tel:{{ $responsable->mobile }}" class="btn btn-dark btn-sm w-50"><i
                                        class="fa fa-mobile me-1"></i>
                                    Contacter</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $responsables->links('vendor.pagination.tailwind') }}
            </div>

        </div>

    </div>


    {{--
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
                                                + Nouveau responsable
                                            </a>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th>responsable</th>
                                                    <th>Adresse</th>
                                                    <th>Contact</th>
                                                    <th>Consommation</th>
                                                    <th>Date Inscription </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($responsables as $responsable)
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
                                                                    <p class="fw-bold mb-1">{{ $responsable->nom }}</p>
                                                                    <p class="text-muted mb-0">{{ $responsable->siret }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <p class="fw-bold mb-1"> <i class="fas fa-map"></i>
                                                                        {{ $responsable->adresse }}</p>
                                                                    <p class="text-muted mb-0">
                                                                        {{ $responsable->ville . ' | ' . $responsable->code_postal . ' | ' . $responsable->pays }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0">{{ $responsable->telephone }}</p>
                                                            <p class="text-muted mb-0">{{ $responsable->email }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-0"><i class="fas fa-plug"></i>
                                                                {{ $responsable->consommation_electrcite }}</p>
                                                            <p class="text-muted mb-0"><i class="fas fa-fire"></i>
                                                                {{ $responsable->consommation_gaz }}</p>
                                                        </td>

                                                        <td>{{ $responsable->created_at }}</td>
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
        </div> --}}
@endsection

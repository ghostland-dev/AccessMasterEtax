@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">

            <h5 class="card-title text-success">Détails de responsable</h5>
            <div class="col  ">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a class="text-muted dropdown-toggle font-size-16 bg-dark text-white p-2 rounded-4 mx-2"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i
                                    class="fa fa-cog"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('responsible.show', $responsable->id) }}"><i
                                        class="fa fa-eye"></i> Détails</a>
                                <a class="dropdown-item" href="{{ route('responsible.edit', $responsable->id) }}"><i
                                        class="fa fa-pen"></i> Editer</a>

                                <form method="POST" action="{{ route('responsible.destroy', $responsable->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                        Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class=""><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                    class="avatar-md rounded-circle img-thumbnail col-md-3" />
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-success">
                                        {{ $responsable->civilite }}. {{ $responsable->nom_famille }}
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
                            <a href="mailto:{{ $responsable->email }}" class="btn p-3 btn-success btn-sm w-50"><i
                                    class="fa fa-mail  me-1"></i>{{ $responsable->email }}</a>
                            <a href="tel:{{ $responsable->mobile }}" class="btn p-3 btn-dark btn-sm w-50"><i
                                    class="fa fa-mobile me-1"></i>
                                {{ $responsable->mobile }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('responsibles') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>

        </div>
    </div>
@endsection

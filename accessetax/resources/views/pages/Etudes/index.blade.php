@extends('layouts.signed')
@section('main')
    <div class="row">

        @foreach ($etudes as $etude)
            <div class="col-md-4 my-2">
                <div class="card h-100">
                    <div class="card-header bg-success  text-dark  text-center">
                        {{ $etude->created_at }}
                    </div>
                    <div class="card-body   ">
                        <h5 class="text-success bg-light-gray p-3  rounded-2">Détails de l'étude</h5>
                        <h5>{{ $etude->nom_etude }}</h5>
                        <p>Nom de l'etude est <b class="text-success"> {{ $etude->nom_etude }}</b>, nom de client <b
                                class="text-success"> {{ $etude->nom_client }}</b>,nom de
                            responsable <b class="text-success">{{ $etude->nom_contact }}</b></p>
                        <span class="bg-light-gray rounded-2 p-2 my-2 ">Responsable : {{ $etude->nom_responsable }}
                        </span>

                        <h5 class="text-success bg-light-gray p-3  rounded-2">Site associé</h5>
                        <h5 class="text-muted">{{ $etude->Site->nom }}</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore.</p>

                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button"
                                id="actionsDropdown{{ $etude->id }}" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $etude->id }}">
                                <li><a class="dropdown-item" href="{{ route('study.show', $etude->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                        Détails</a></li>
                                <li><a class="dropdown-item" href="{{ route('study.edit', $etude->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                        Modifier</a></li>
                                <li>
                                    <form method="POST" action="{{ route('study.destroy', $etude->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                            Supprimer</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>


            <!--end col-->
        @endforeach

    </div>
@endsection

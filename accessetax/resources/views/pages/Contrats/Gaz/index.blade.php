@extends('layouts.signed')
@section('main')
    <table class="table align-middle mb-0 bg-white">
        <a href="{{ route('contractGaz.create') }}" class="btn btn-success m-3 ">
            + Nouveau contrat de gaz
        </a>
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>
                <th>ID Contrat</th>
                <th>Période</th>
                <th>Signature</th>
                <th>Compteur</th>
                <th>fournisseur</th>
                <th>Date Inscription </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contratGazs as $contratGaz)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $contratGaz->nom_contrat }}</p>

                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> <i class="fas fa-date"></i> {{ $contratGaz->date_debut }}</p>
                                <p class="fw-bold mb-1"> <i class="fas fa-date"></i> {{ $contratGaz->date_fin }}</p>

                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $contratGaz->date_signature }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $contratGaz->gaz_meter_id }}</p>

                    </td>
                    <td>

                        <p class="text-muted mb-0">{{ $contratGaz->fournisseur }}</p>

                    </td>
                    <td>{{ $contratGaz->created_at }}</td>
                    <td>
                        <a class="btn btn-dark" href="{{ $contratGaz->fichier }}" download><i
                                class="fa fa-download text-white"></i></a>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button"
                                id="actionsDropdown{{ $contratGaz->id }}" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $contratGaz->id }}">
                                <li><a class="dropdown-item" href="{{ route('contractGaz.show', $contratGaz->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                        Détails</a></li>
                                <li><a class="dropdown-item" href="{{ route('contractGaz.edit', $contratGaz->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                        Modifier</a></li>
                                <li>
                                    <form method="POST" action="{{ route('contractGaz.destroy', $contratGaz->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
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
@endsection

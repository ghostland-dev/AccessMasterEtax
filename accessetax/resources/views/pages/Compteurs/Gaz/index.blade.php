@extends('layouts.signed')
@section('main')
    <table class="table align-middle mb-0 bg-white">
        <a href="{{ route('gazMeter.create') }}" class="btn btn-success m-3 ">
            + Nouveau compteur de gaz
        </a>
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>
                <th>ID</th>
                <th>Nom de site</th>
                <th>Client</th>
                <th>Contact</th>
                <th>Profil</th>
                <th>Consummation</th>
                <th>Date Inscription </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compteursGazs as $compteursGaz)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>

                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> <b class="text-dark">SIRET</b> {{ $compteursGaz->siret }}</p>
                                <p class="text-muted mb-0"><b class="text-dark">PCE</b> {{ $compteursGaz->PCE }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $compteursGaz->nom_site }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0"><b class="text-dark">Etude :</b> {{ $compteursGaz->nom_etude }}</p>
                        <p class="text-muted mb-0"><b class="text-dark">Client :</b> {{ $compteursGaz->nom_client }}</p>
                    </td>

                    <td>
                        <p class="text-muted mb-0"><b class="text-dark">contact :</b> {{ $compteursGaz->nom_contact }}</p>
                        <p class="text-muted mb-0"><b class="text-dark">Responsable :</b>
                            {{ $compteursGaz->nom_responsable }}</p>
                    </td>

                    <td>
                        <p class="text-muted mb-0 ">{{ $compteursGaz->profil }}</p>
                        <p class="text-muted mb-0">{{ $compteursGaz->tarif }}</p>
                    </td>

                    <td>
                        <p class="text-muted mb-0">{{ $compteursGaz->consommation_mentsauelle }} €</p>
                        <p class="text-muted mb-0">{{ $compteursGaz->consommation_annuelle }} €</p>
                    </td>


                    <td>{{ $compteursGaz->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button"
                                id="actionsDropdown{{ $compteursGaz->id }}" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $compteursGaz->id }}">
                                <li><a class="dropdown-item" href="{{ route('elecMeter.show', $compteursGaz->id) }}"
                                        target="_blank" rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                        Détails</a></li>
                                <li><a class="dropdown-item" href="{{ route('elecMeter.edit', $compteursGaz->id) }}"
                                        target="_blank" rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                        Modifier</a></li>
                                <li>
                                    <form method="POST" action="{{ route('elecMeter.destroy', $compteursGaz->id) }}">
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

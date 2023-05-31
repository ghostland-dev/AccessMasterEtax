@extends('layouts.signed')
@section('main')
    <table class="table align-middle mb-0 bg-white">
        <a href="{{ route('elecMeter.create') }}" class="btn btn-success m-3 ">
            + Nouveau compteur d'éléctrcité
        </a>
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>
                <th>PDL</th>
                <th>Puissance</th>
                <th>Fournisseur</th>
                <th>Consummation</th>
                <th>Profil</th>
                <th>Année</th>
                <th>Site</th>
                <th>Date Inscription </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compteursElecs as $compteursElec)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $compteursElec->PDL }}</p>
                                <p class="text-muted mb-0">{{ $compteursElec->nom_compteur }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> {{ $compteursElec->puissance }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-bold mb-1"> {{ $compteursElec->fournisseur }}</p>
                    </td>
                    <td>
                        <p class="fw-bold mb-1"> {{ $compteursElec->profile }}</p>
                    </td>
                    <td>
                        <p class="fw-bold mb-1"> {{ $compteursElec->consommation }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $compteursElec->annee }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $compteursElec->site_id }}</p>
                    </td>

                    <td>{{ $compteursElec->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button"
                                id="actionsDropdown{{ $compteursElec->id }}" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $compteursElec->id }}">
                                <li><a class="dropdown-item" href="{{ route('elecMeter.show', $compteursElec->id) }}"
                                        target="_blank" rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                        Détails</a></li>
                                <li><a class="dropdown-item" href="{{ route('elecMeter.edit', $compteursElec->id) }}"
                                        target="_blank" rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                        Modifier</a></li>
                                <li>
                                    <form method="POST" action="{{ route('elecMeter.destroy', $compteursElec->id) }}">
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

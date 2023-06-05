@extends('layouts.signed')
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table align-middle   mb-0 bg-white">
                    <a href="{{ route('billGaz.create') }}" class="btn btn-success m-3 ">
                        + Nouvelle facture d'éléctrcité
                    </a>
                    <thead class="bg-light   ">
                        <tr class="text-align-center">
                            <th scope="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </th>
                            <th>N° Facture</th>
                            <th>Fournisseur</th>
                            <th>Consommation</th>
                            <th>Période </th>
                            <th>Année </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FactureGazs as $FactureGaz)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                    </div>
                                </th>
                                <td>
                                    <div class="d-flex align-items-start">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">
                                                {{ $FactureGaz->numero_facture }}</p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-start">
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">
                                                <span class=" ">
                                                    {{ $FactureGaz->fournisseur }} </span>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-start">
                                        <div class="ms-3">
                                            <p class="fw-bold  my-2">
                                                <span class="bg-light  px-3 py-2 text-bold  rounded-2 text-success">
                                                    {{ $FactureGaz->consommation }} €/kw</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="   text-center">
                                    <p class="text-muted mb-0">
                                        <span class="text-light ">
                                            <p class="fw-bold  my-2">
                                                <span class="text-danger bg-light  my-2  px-3 py-2 text-bold  rounded-2">
                                                    {{ $FactureGaz->date_debut }} </span> <i class="fa fa-arrow-right"></i>
                                                <span class="text-success bg-light  my-2 px-3 py-2 text-bold  rounded-2">
                                                    {{ $FactureGaz->date_fin }}</span>
                                            </p>
                                        </span>
                                    </p>

                                </td>

                                <td>{{ $FactureGaz->annee }}</td>
                                <td>
                                    <a class="btn btn-dark" href="{{ $FactureGaz->fichier }}" download><i
                                            class="fa fa-download text-white"></i></a>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="actionsDropdown{{ $FactureGaz->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $FactureGaz->id }}">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('billGaz.show', $FactureGaz->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                                    Détails</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('billGaz.edit', $FactureGaz->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                                    Modifier</a></li>
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('billGaz.destroy', $FactureGaz->id) }}">
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


            </div>
        </div>
    </div>>
@endsection

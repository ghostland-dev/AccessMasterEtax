@extends('layouts.signed')

@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">



                <a class="btn btn-success my-4" href="{{ route('taxRed.create') }}"> + Nouveau
                    Taux réduit</a>
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </th>
                            <th>Titre</th>
                            <th>conssomation(MKW)</th>
                            <th>remuneration</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($TauxReduits as $TauxReduit)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                    </div>
                                </th>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-3">
                                            <p class="text-muted mb-0">
                                                {{ $TauxReduit->titre }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="text-muted mb-0">
                                                {{ $TauxReduit->consommation_mkw }} €/Mkw
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="text-muted mb-0">
                                                {{ $TauxReduit->remuneration }} €
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <p class="text-center ">

                                        {{ $TauxReduit->created_at }}

                                    </p>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="actionsDropdown{{ $TauxReduit->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $TauxReduit->id }}">
                                            <li><a class="dropdown-item" href="{{ route('taxRed.show', $TauxReduit->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                                    Détails</a></li>
                                            <li><a class="dropdown-item" href="{{ route('taxRed.edit', $TauxReduit->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                                    Modifier</a></li>
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('taxRed.destroy', $TauxReduit->id) }}">
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
                <div class="mt-4">
                    {{ $TauxReduits->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection

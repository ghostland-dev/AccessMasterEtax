@extends('layouts.signed')

@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">



                <a class="btn btn-success my-4" href="{{ route('tcgnElig.create') }}"> + Nouveau
                    Test d'Eligibilité CSPE</a>
                <table class="table  ">
                    <thead class="bg-light">
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </th>

                            <th>Client</th>

                            <th>Validité (complet)</th>
                            <th>Economie (€)</th>
                            <th>C.A Access (Brut)</th>
                            <th>C.A Access (Net)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($EligibiliteTICGNs as $EligibiliteTICGN)
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                    </div>
                                </th>

                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class=" ">
                                            <p class=" font-bold "> <i class="fa fa-home mx-2 text-emerald-400"></i>
                                                {{ $EligibiliteTICGN->study->site->company->denomination }}</p>
                                            <p class=" font-bold "><i class="fa fa-clipboard mx-2 text-emerald-400"></i>
                                                {{ $EligibiliteTICGN->study->site->company->siret }}</p>

                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p
                                                class="btn  {{ $EligibiliteTICGN->fullvalidation ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                                {{ $EligibiliteTICGN->fullvalidation ? 'Oui' : 'Non' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="px-3  py-2 rounded-md bg-slate-50 text-success">
                                                {{ $EligibiliteTICGN->esitmationEconomie }} €</p>
                                        </div>
                                    </div>
                                </td>



                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class=" px-3  py-2 rounded-md bg-slate-50 text-success">
                                                {{ $EligibiliteTICGN->chiffreAffaireBrut_AE }} €
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="px-3  py-2 rounded-md bg-slate-50 text-success">
                                                {{ $EligibiliteTICGN->chiffreAffaireNet_AE }} €</p>
                                        </div>
                                    </div>
                                </td>



                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="actionsDropdown{{ $EligibiliteTICGN->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu"
                                            aria-labelledby="actionsDropdown{{ $EligibiliteTICGN->id }}">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('tcgnElig.show', $EligibiliteTICGN->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                                    Détails</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('tcgnElig.edit', $EligibiliteTICGN->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                                    Modifier</a></li>
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('tcgnElig.destroy', $EligibiliteTICGN->id) }}">
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
    </div>
@endsection

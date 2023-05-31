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

                            <th>Validation (01)</th>
                            <th>Validation (02)</th>
                            <th>Validation (03)</th>
                            <th>Validité (complet)</th>
                            <th>Economie (€)</th>
                            <th>Taxe Elec Plain</th>
                            <th>Taxe Gaz Plain</th>
                            <th>Taxe TICGN</th>
                            <th>C.A Access (Brut)</th>
                            <th>C.A Access (Net)</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($EligibiliteTICGNs as $EligibiliteTICGN)
                            <tr>
                                <th >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                    </div>
                                </th>

                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p
                                                class="btn  {{ $EligibiliteTICGN->Validation01 ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                                {{ $EligibiliteTICGN->Validation01 ? 'Oui' : 'Non' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p
                                                class="btn  {{ $EligibiliteTICGN->Validation02 ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                                {{ $EligibiliteTICGN->Validation02 ? 'Oui' : 'Non' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p
                                                class="btn  {{ $EligibiliteTICGN->Validation03 ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                                {{ $EligibiliteTICGN->Validation03 ? 'Oui' : 'Non' }}
                                            </p>
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
                                            <p class="text-muted mb-0">
                                                {{ $EligibiliteTICGN->esitmationEconomie }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="text-muted mb-0">
                                                {{ $EligibiliteTICGN->SommeTotalTaxElecPlein }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="text-muted mb-0">
                                                {{ $EligibiliteTICGN->SommeTotalTaxGazPlein }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="text-muted mb-0">
                                                {{ $EligibiliteTICGN->SommeTotalTaxTCGNReduit }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class=" btn btn-light-primary text-primary">
                                                {{ $EligibiliteTICGN->chiffreAffaireBrut_AE }} €
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="btn btn-light-primary text-primary">
                                                {{ $EligibiliteTICGN->chiffreAffaireNet_AE }} €</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" ">

                                        <div class=" ">
                                            <p class="text-muted mb-0">
                                                {{ $EligibiliteTICGN->created_at }}</p>
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

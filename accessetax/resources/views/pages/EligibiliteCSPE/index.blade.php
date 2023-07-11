@extends('layouts.signed')

@section('main')
    <a class="btn btn-success my-3  " href="{{ route('cspeElig.create') }}"> + Nouveau Test d'Eligibilité CSPE</a>
    <table class="table align-middle  bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>

                <th>Client</th>
                <th>Eligible (Reduit)</th>
                <th>Risque Fuite(CO²)</th>
                <th>Gagne Client</th>
                <th>C.A Access (Brût)</th>
                <th>C.A Access (Net)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elegibiliteCSPEs as $EligibilityCSPE)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>

                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p class=" font-bold "> <i class="fa fa-home mx-2 text-emerald-400"></i>
                                    {{ $EligibilityCSPE->study->site->company->denomination }}</p>
                                <p class=" font-bold "><i class="fa fa-clipboard mx-2 text-emerald-400"></i>
                                    {{ $EligibilityCSPE->study->site->company->siret }}</p>

                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p
                                    class="btn  {{ $EligibilityCSPE->EligibiliteReduit ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                    {{ $EligibilityCSPE->EligibiliteReduit ? 'Oui' : 'Non' }}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p
                                    class="  btn   {{ $EligibilityCSPE->SoumisRisqueFuitCO2 ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                    {{ $EligibilityCSPE->SoumisRisqueFuitCO2 ? 'Oui' : 'Non' }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p class="  px-3  py-2 rounded-md bg-slate-50 text-success">
                                    {{ $EligibilityCSPE->RemboursementClient }} €</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p class=" px-3  py-2 rounded-md bg-slate-50 text-success">
                                    {{ $EligibilityCSPE->chiffreAffaireBrut_AE }} €</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class=" ">
                                <p class="px-3  py-2 rounded-md bg-slate-50 text-success">
                                    {{ $EligibilityCSPE->chiffreAffaireNet_AE }} €</p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button"
                                id="actionsDropdown{{ $EligibilityCSPE->id }}" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $EligibilityCSPE->id }}">
                                <li><a class="dropdown-item" href="{{ route('cspeElig.show', $EligibilityCSPE->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                        Détails</a></li>
                                <li><a class="dropdown-item" href="{{ route('cspeElig.edit', $EligibilityCSPE->id) }}"
                                        rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                        Modifier</a></li>
                                <li>
                                    <form method="POST" action="{{ route('cspeElig.destroy', $EligibilityCSPE->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                            Supprimer</button>
                                    </form>
                                </li>
                            </ul>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $elegibiliteCSPEs->links('vendor.pagination.tailwind') }}
    </div>
@endsection

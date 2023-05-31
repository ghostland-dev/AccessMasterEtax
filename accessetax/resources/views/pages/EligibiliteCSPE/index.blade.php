@extends('layouts.signed')

@section('main')
    @if (session('status'))
        <div class="alert bg-light-success text-success text-center" role="alert">
            <i class="fa fa-trash"></i> {{ session('status') }}
        </div>
    @endif

    <a class="btn btn-success my-3  " href="{{ route('cspeElig.create') }}"> + Nouveau Test d'Eligibilité CSPE</a>
    <table class="table align-middle  bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>

                <th>Taux Reduit (CSPE)</th>
                <th>Taux Plain (CSPE)</th>
                <th>Nouveau Taux (CSPE)</th>
                <th>Eligible (Reduit)</th>
                <th>Electro-intensité</th>
                <th>Risque Fuite(CO²)</th>
                <th>Gagne Client</th>
                <th>C.A Access (Brût)</th>
                <th>C.A Access (Net)</th>

                <th>Date création</th>


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

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->MotnantCSPETauxReduit }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->CSPEtauxPlein }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->NouveaTauxReduit }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p
                                    class="btn  {{ $EligibilityCSPE->EligibiliteReduit ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                    {{ $EligibilityCSPE->EligibiliteReduit ? 'Oui' : 'Non' }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->RatioElectroIntense }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p
                                    class="  btn   {{ $EligibilityCSPE->SoumisRisqueFuitCO2 ? 'text-success btn-light-success' : 'text-danger btn-light-danger' }}">
                                    {{ $EligibilityCSPE->SoumisRisqueFuitCO2 ? 'Oui' : 'Non' }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->RemboursementClient }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class=" btn btn-light-primary text-primary">
                                    {{ $EligibilityCSPE->chiffreAffaireBrut_AE }} €</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="btn btn-light-primary text-primary">
                                    {{ $EligibilityCSPE->chiffreAffaireNet_AE }} €</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $EligibilityCSPE->created_at }}</p>
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
@endsection

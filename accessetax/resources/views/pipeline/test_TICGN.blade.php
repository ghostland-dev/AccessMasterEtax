@extends('layouts.app')
@section('content')
    <div class="fullheight centred h-screen bg-gradient-to-t from-slate-500 to-green-500">
        <div class="container px-6 pt-3 card ">
            <div class="row justify-content-center">

                <div class="col-md-6 ">
                    <h5 class="card-header bg-success text-center text-white">{{ __('Test d\'Eligibilité TICGN') }}</h5>
                    <div class="card mt-3">

                        <form class="   justify-content-center " action="{{ route('ValidationTICGN') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="grid gap-2 px-3 py-4 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                                <div class=" ">
                                    <label for="valeurAjouterEuro">Valeur Ajoutée</label>
                                    <input type="text" name="valeurAjouterEuro" id="valeurAjouterEuro"
                                        class="form-control" placeholder="votre Code NAF ... " required>
                                </div>
                                <div class=" ">
                                    <label for="consumAnGazKwh">Consommation de gaz</label>
                                    <input type="number" name="consumAnGazKwh" id="consumAnGazKwh" class="form-control"
                                        placeholder=" la valeur ajoutée ..." required>
                                </div>
                                <div class=" ">
                                    <label for="consumAnElecKwh">Consommation d'électricité</label>
                                    <input type="number" name="consumAnElecKwh" id="consumAnElecKwh" class="form-control"
                                        placeholder="Consummation annulle de referance ( €/Mkw ) " required>
                                </div>
                                <div class=" ">
                                    <label for="valeurProduction">Valeur de production</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="valeurProduction"
                                        id="valeurProduction" class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="achatGaz">Achat de gaz</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="achatGaz" id="achatGaz"
                                        class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="achatPetroliers">Achat de pétroliers</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="achatPetroliers"
                                        id="achatPetroliers" class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="achatChaleur">Achat de chaleur</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="achatChaleur"
                                        id="achatChaleur" class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="autres">Autres achats</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="autres" id="autres"
                                        class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="consumAnAutreKwh">Consommation annuelle autre</label>
                                    <input type="number" step="0.001" placeholder="0.00" name="consumAnAutreKwh"
                                        id="consumAnAutreKwh" class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="combustionProcessus">Processus combustion</label>
                                    <select name="combustionProcessus" id="combustionProcessus" class="form-control"
                                        required>
                                        <option value="true">Oui, Il est soumis au processus de combustion</option>
                                        <option value="false">Non, Il n'est pas soumis au processus de combustion</option>
                                    </select>
                                </div>
                                <div class=" ">
                                    <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                                    <input type="nummber" placeholder="0.00" name="pourcentageConsuPorcessus"
                                        id="pourcentageConsuPorcessus" class="form-control" required>
                                </div>
                                <div class=" ">
                                    <label for="NaceCode">Code Nace</label>
                                    <input type="text" placeholder="0.00" name="NaceCode" id="NaceCode"
                                        class="form-control" required>
                                </div>


                            </div>
                            <div class=" my-3 w-1/2 mx-auto ">
                                <button type="submit" class=" w-100 btn btn-success p-3"> lancez le teste d'éligibilité
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class=" card ">

                        <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                            <i class="fa fa-fire bg-light text-emerald-400 rounded-full p-2 mx-2"></i> Test
                            d'éligibilité aux taux TICGN
                        </h5>
                        <ul class=" p-4">
                            @if (isset($fullvalidation))
                                <li
                                    class="{{ $Validation01 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong>Etape 1 (Code Nace):</strong> <span id="Validation01">
                                        {{ $Validation01 ? 'Super ! bien réussi .' : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                                </li>
                                <li
                                    class="{{ $Validation02 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong>Etape 2 (Combustion):</strong> <span id="Validation02">
                                        {{ $Validation02 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                                </li>
                                <li
                                    class="{{ $Validation03 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong>Etape 3 (Code Taux):</strong> <span id="Validation03">
                                        {{ $Validation03 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                                </li>

                                <li
                                    class="bg-light text-success results p-4 my-2 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-3 ">


                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">
                                            Taux gaz plein</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $SommeTotalTaxGazPlein }} € </h6>
                                    </div>
                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">
                                            Taux électricité plein</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $SommeTotalTaxElecPlein }} € </h6>
                                    </div>
                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">Estimation de
                                            remboursement</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $esitmationEconomie }} € </h6>
                                    </div>



                                </li>
                            @elseif (!isset($fullvalidation))
                                <li class="bg-light-warning text-warning p-4 my-2">

                                    <strong>Rappel:</strong> <span id="estimationEconomie">
                                        {{ __('Veuillez remplissez la formulaire pour faire afficher les résulats  ') }}
                                    </span>

                                </li>
                            @else
                                <li class="bg-light-danger text-danger p-4 my-2">

                                    <strong>Estimation de remboursement:</strong> <span id="estimationEconomie">
                                        {{ __('Désolé, nous ne remplessez pas les créteres pour bénéficier des taux de remboursement TICGN  ') }}
                                    </span>

                                </li>
                            @endif
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

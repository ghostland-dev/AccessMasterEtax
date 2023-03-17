@extends('layouts.app')
@section('content')
    <div class="bg-dark fullheight centred">
        <div class="container px-6 pt-3 card ">
            <div class="row justify-content-center">

                <div class="col-md-6 ">
                    <div class="card mt-3">
                        <h4 class="text-center bg-light-success text-success rounded-2 p-3">Test Eligibilite TCGN</h4>
                        <form class=" col-md-12 d-flex gap-lg-3  justify-content-center flex-wrap"
                            action="{{ route('ValidationTICGN') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group ">
                                <label for="valeurAjouterEuro">Valeur Ajoutée</label>
                                <input type="number" step="0.001" placeholder="0.00" name="valeurAjouterEuro"
                                    id="valeurAjouterEuro" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="consumAnGazKwh">Consommation de gaz</label>
                                <input type="number" step="0.001" placeholder="0.00" name="consumAnGazKwh"
                                    id="consumAnGazKwh" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="consumAnElecKwh">Consommation d'électricité</label>
                                <input type="number" step="0.001" placeholder="0.00" name="consumAnElecKwh"
                                    id="consumAnElecKwh" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="valeurProduction">Valeur de production</label>
                                <input type="number" step="0.001" placeholder="0.00" name="valeurProduction"
                                    id="valeurProduction" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="achatGaz">Achat de gaz</label>
                                <input type="number" step="0.001" placeholder="0.00" name="achatGaz" id="achatGaz"
                                    class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="achatPetroliers">Achat de pétroliers</label>
                                <input type="number" step="0.001" placeholder="0.00" name="achatPetroliers"
                                    id="achatPetroliers" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="achatChaleur">Achat de chaleur</label>
                                <input type="number" step="0.001" placeholder="0.00" name="achatChaleur"
                                    id="achatChaleur" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="autres">Autres achats</label>
                                <input type="number" step="0.001" placeholder="0.00" name="autres" id="autres"
                                    class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="consumAnAutreKwh">Consommation annuelle autre</label>
                                <input type="number" step="0.001" placeholder="0.00" name="consumAnAutreKwh"
                                    id="consumAnAutreKwh" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="combustionProcessus">Processus combustion</label>
                                <select name="combustionProcessus" id="combustionProcessus" class="form-control" required>
                                    <option value="true">Oui, Il est soumis au processus de combustion</option>
                                    <option value="false">Non, Il n'est pas soumis au processus de combustion</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                                <input type="nummber" placeholder="0.00" name="pourcentageConsuPorcessus"
                                    id="pourcentageConsuPorcessus" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="NaceCode">Code Nace</label>
                                <input type="text" placeholder="0.00" name="NaceCode" id="NaceCode"
                                    class="form-control" required>
                            </div>
                            <div class="form-group my-3 ">
                                <button type="submit" class=" w-100 btn btn-success p-3"> lancez le teste d'éligibilité
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card mt-3">

                        <h4 class="bg-success text-center p-2 rounded-2  text-bg-muted m-3 wow">Tester d'éligibilité aux
                            taux
                            TICGN</h4>
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

                                <li class="bg-light-dark text-success p-4 my-2">
                                    <strong>Somme total des taux gaz plein: <h6 class="text-dark"
                                            id="estimationEconomie ">
                                            {{ $SommeTotalTaxGazPlein }} € Hors TVA</h6></strong>
                                    <hr>
                                    <strong>Somme total des taux électricité plein: <h6 class="text-dark"
                                            id="estimationEconomie ">
                                            {{ $SommeTotalTaxElecPlein }} € Hors TVA</h6></strong>
                                    <hr>
                                    <strong>Estimation de remboursement: <h4 class="text-dark" id="estimationEconomie ">
                                            {{ $esitmationEconomie }} € Hors TVA</h4></strong>
                                    <hr>
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

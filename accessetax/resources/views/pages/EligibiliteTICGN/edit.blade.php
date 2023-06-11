@extends('layouts.signed')

@section('main')
    <div class="container-fluid  ">
        <h4 class="text-center bg-success text-white rounded-2 p-3">Modifier le teste d'éligibilite TICGN</h4>
        <form action="{{ route('tcgnElig.update', $EligibiliteTICGN->id) }}" method="POST" class="form-group">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-3 shadow p-3 rounded-md ">

                <div class=" space-y-2    ">
                    <label for="valeurAjouterEuro">Valeur Ajoutée</label>
                    <input type="number" name="valeurAjouterEuro" id="valeurAjouterEuro"
                        value="{{ $EligibiliteTICGN->valeurAjouterEuro }}" class="form-control"
                        placeholder="votre Code NAF ... " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnGazKwh">Consommation de gaz</label>
                    <input type="number" name="consumAnGazKwh" id="consumAnGazKwh"
                        value="{{ $EligibiliteTICGN->consumAnGazKwh }}" class="form-control"
                        placeholder=" la valeur ajoutée ..." required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnElecKwh">Consommation d'électricité</label>
                    <input type="number" name="consumAnElecKwh" id="consumAnElecKwh"
                        value="{{ $EligibiliteTICGN->consumAnElecKwh }}" class="form-control"
                        placeholder="Consummation annulle de referance ( €/Mkw ) " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="valeurProduction">Valeur de production</label>
                    <input type="number" step="0.001" placeholder="0.00" name="valeurProduction"
                        value="{{ $EligibiliteTICGN->valeurProduction }}" id="valeurProduction" class="form-control"
                        required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatGaz">Achat de gaz</label>
                    <input type="number" step="0.001" placeholder="0.00" name="achatGaz"
                        value="{{ $EligibiliteTICGN->achatGaz }}" id="achatGaz" class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatPetroliers">Achat de pétroliers</label>
                    <input type="number" step="0.001" placeholder="0.00" name="achatPetroliers"
                        value="{{ $EligibiliteTICGN->achatPetroliers }}" id="achatPetroliers" class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatChaleur">Achat de chaleur</label>
                    <input type="number" step="0.001" placeholder="0.00" name="achatChaleur"
                        value="{{ $EligibiliteTICGN->achatChaleur }}" id="achatChaleur" class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="autres">Autres achats</label>
                    <input type="number" step="0.001" placeholder="0.00" name="autres"
                        value="{{ $EligibiliteTICGN->autres }}" id="autres" class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnAutreKwh">Consommation annuelle autre</label>
                    <input type="number" step="0.001" placeholder="0.00" name="consumAnAutreKwh"
                        value="{{ $EligibiliteTICGN->consumAnAutreKwh }}" id="consumAnAutreKwh" class="form-control"
                        required>
                </div>

                <div class=" space-y-2 ">
                    <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                    <input type="nummber" placeholder="0.00" name="pourcentageConsuPorcessus"
                        value="{{ $EligibiliteTICGN->pourcentageConsuPorcessus }}" id="pourcentageConsuPorcessus"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="NaceCode">Code Nace</label>
                    <input type="text" placeholder="0.00" name="NaceCode" id="NaceCode"
                        value="{{ $EligibiliteTICGN->NaceCode }}" class="form-control" required>
                </div>

                <div class=" space-y-2 ">
                    <label for="combustionProcessus">Processus combustion</label>
                    <select name="combustionProcessus" id="combustionProcessus" class="form-select" required>
                        <option {{ $EligibiliteTICGN->combustionProcessus ? 'selected' : '' }} value="1">Oui, Il est
                            soumis au processus de combustion</option>
                        <option {{ $EligibiliteTICGN->combustionProcessus ? 'selected' : '' }} value="0">Non, Il n'est
                            pas soumis au processus de combustion</option>
                    </select>
                </div>

                <div class=" space-y-2 ">
                    <label for="study_id">Assigné à l'étude</label>
                    <select name="study_id" id="study_id" class="form-select" required>

                        @foreach($etudes as $etude)
                            <option {{ $etude->id == $EligibiliteTICGN->study_id ? 'selected' : '' }}
                                value="{{ $etude->id }}">
                                {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="w-100">
                <button type="submit" class="my-3   mx-auto btn btn-dark p-2 px-4"> lancez le teste d'éligibilité
                </button>
            </div>
        </form>
    </div>
@endsection

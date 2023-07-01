@extends('layouts.signed')

@section('main')
    <div class="container-fluid  ">
        <h4 class="text-center bg-success text-white rounded-2 p-3">Nouveau teste éligibilité TICGN</h4>
        <form action="{{ route('tcgnElig.store') }}" method="POST" class="form-group">
            @csrf
            @method('POST')


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div id="formsContainer">

                 <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-3 shadow-md p-3 rounded-md my-3">

                <div class=" space-y-2    ">
                    <label for="valeurAjouterEuro">Valeur Ajoutée</label>
                    <input type="number" name="valeurAjouterEuro[]" id="valeurAjouterEuro" class="form-control"
                        placeholder="votre Code NAF ... " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnGazKwh">Consommation de gaz</label>
                    <input type="number" name="consumAnGazKwh[]" id="consumAnGazKwh"   class="form-control"
                        placeholder=" la valeur ajoutée ..." required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnElecKwh">Consommation d'électricité</label>
                    <input type="number" name="consumAnElecKwh[]" id="consumAnElecKwh" class="form-control"
                        placeholder="Consummation annulle de referance ( €/Mkw ) " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="valeurProduction">Valeur de production</label>
                    <input type="number"  value="0" placeholder="0.00" value="0" name="valeurProduction[]" id="valeurProduction"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatGaz">Achat de gaz</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatGaz[]" id="achatGaz"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatPetroliers">Achat de pétroliers</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatPetroliers[]" id="achatPetroliers"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatChaleur">Achat de chaleur</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatChaleur[]" id="achatChaleur"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="autres">Autres achats</label>
                    <input type="number"  value="0" placeholder="0.00" name="autres[]" id="autres"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnAutreKwh">Consommation annuelle autre</label>
                    <input type="number"  value="0" placeholder="0.00" name="consumAnAutreKwh[]" id="consumAnAutreKwh"
                        class="form-control" required>
                </div>

                <div class=" space-y-2 ">
                    <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                    <input type="nummber" placeholder="0.00" name="pourcentageConsuPorcessus[]" id="pourcentageConsuPorcessus"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="NaceCode">Code Nace</label>
                    <input type="text" placeholder="0.00" name="NaceCode[]" id="NaceCode" class="form-control" required>
                </div>

                <div class=" space-y-2 ">
                    <label for="combustionProcessus">Processus combustion</label>
                    <select name="combustionProcessus[]" id="combustionProcessus" class="form-select" required>
                        <option value="1">Oui, Il est soumis au processus de combustion</option>
                        <option value="0">Non, Il n'est pas soumis au processus de combustion</option>
                    </select>
                </div>

                <div class=" space-y-2 ">
                    <label for="study_id">Assigné à l'étude</label>
                    <select name="study_id[]" id="study_id" class="form-select" required>

                        @foreach ($etudes as $etude)
                            <option value="{{ $etude->id }}">
                                {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                        @endforeach

                    </select>
                </div>


            </div>
            </div>

            <div class="w-100">
                <button type="submit" class="btn btn-success m-2">
                    {{ __('lancez le teste d\'éligibilité') }} <i class="fa fa-arrow-right  " aria-hidden="true"></i>
                </button>


                <button id="addFormButton" class="btn btn-dark m-2">{{ __('Ajouter un nouveau formulaire') }}</button>

            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            let formIndex = 1;

            $('#addFormButton').click(function(e) {
                e.preventDefault();
                let newForm = `
                  <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-3 shadow-md p-3 rounded-md my-3">

                <div class=" space-y-2    ">
                    <label for="valeurAjouterEuro">Valeur Ajoutée</label>
                    <input type="number" name="valeurAjouterEuro[]" id="valeurAjouterEuro" class="form-control"
                        placeholder="votre Code NAF ... " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnGazKwh">Consommation de gaz</label>
                    <input type="number" name="consumAnGazKwh[]" id="consumAnGazKwh"   class="form-control"
                        placeholder=" la valeur ajoutée ..." required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnElecKwh">Consommation d'électricité</label>
                    <input type="number" name="consumAnElecKwh[]" id="consumAnElecKwh" class="form-control"
                        placeholder="Consummation annulle de referance ( €/Mkw ) " required>
                </div>
                <div class=" space-y-2 ">
                    <label for="valeurProduction">Valeur de production</label>
                    <input type="number"  value="0" placeholder="0.00" value="0" name="valeurProduction[]" id="valeurProduction"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatGaz">Achat de gaz</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatGaz[]" id="achatGaz"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatPetroliers">Achat de pétroliers</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatPetroliers[]" id="achatPetroliers"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="achatChaleur">Achat de chaleur</label>
                    <input type="number"  value="0" placeholder="0.00" name="achatChaleur[]" id="achatChaleur"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="autres">Autres achats</label>
                    <input type="number"  value="0" placeholder="0.00" name="autres[]" id="autres"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="consumAnAutreKwh">Consommation annuelle autre</label>
                    <input type="number"  value="0" placeholder="0.00" name="consumAnAutreKwh[]" id="consumAnAutreKwh"
                        class="form-control" required>
                </div>

                <div class=" space-y-2 ">
                    <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                    <input type="nummber" placeholder="0.00" name="pourcentageConsuPorcessus[]" id="pourcentageConsuPorcessus"
                        class="form-control" required>
                </div>
                <div class=" space-y-2 ">
                    <label for="NaceCode">Code Nace</label>
                    <input type="text" placeholder="0.00" name="NaceCode[]" id="NaceCode" class="form-control" required>
                </div>

                <div class=" space-y-2 ">
                    <label for="combustionProcessus">Processus combustion</label>
                    <select name="combustionProcessus[]" id="combustionProcessus" class="form-select" required>
                        <option value="1">Oui, Il est soumis au processus de combustion</option>
                        <option value="0">Non, Il n'est pas soumis au processus de combustion</option>
                    </select>
                </div>

                <div class=" space-y-2 ">
                    <label for="study_id">Assigné à l'étude</label>
                    <select name="study_id[]" id="study_id" class="form-select" required>

                        @foreach ($etudes as $etude)
                            <option value="{{ $etude->id }}">
                                {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                        @endforeach

                    </select>
                </div>


            </div>
                `;

                $('#formsContainer').append(newForm);
                formIndex++;
            });
        });
    </script>
@endsection

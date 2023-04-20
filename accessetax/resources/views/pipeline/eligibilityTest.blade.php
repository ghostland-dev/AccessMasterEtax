@extends('layouts.app')
@section('content')

@php
 $step =1;
@endphp
 @include('layouts.partials.timeline')
    <div class="main">


        <div class="container-fluid bg-light pt-3 card s">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="  mt-3 card ">

                        <div class="card-body">

                            <form id="multistep-form" method="POST" action="{{ route('resultsCSPETICGN') }}">
                                @csrf
                                <div class="form-step shadow " id="step1">
                                    <h5 class="card-header bg-success text-center text-white">
                                        {{ __('Test d\'Eligibilité CSPE') }}
                                    </h5>

                                    <div class='row p-3'>

                                        <div class="col-md-12 form-group">
                                            <label for="SIREN">SIREN</label>
                                            <input type="text" name="SIREN" id="SIREN" class="form-control"
                                                placeholder="SIREN ..." minlength=6 maxlength=10 required autocomplete="">
                                                 @error('SIREN')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            <button class="btn btn-success my-1" onclick="event.preventDefault()"
                                                id="nafGen">Récuperez mon code
                                                NAF</button>
                                        </div>

                                        <div class="col-md-12 form-group codeNaf">
                                            <label for="codeNaf">Code NAF</label>
                                            <input type="text" name="ELECcodeNaf" id="codeNaf"
                                               class="form-control" placeholder=" Code NAF ..."
                                                maxlength="10" required autocomplete="">
                                                @error('codeNaf')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror

                                            <div class="dropdown">
                                                <ul class="dropdown-menu" aria-labelledby="codeNaf"></ul>
                                            </div>
                                        </div>

                                        <div id="otherFields" style="display: none">
                                            <div class="col-md-12 form-group">
                                                <label for="ELECvaleurAjouter">Valeur ajoutée</label>
                                                <input type="number" name="ELECvaleurAjouter" id="ELECvaleurAjouter"
                                                    class="form-control" placeholder="Valeur ajoutée ... " min=0
                                                    maxlength="8" required>
                                                    @error('ELECvaleurAjouter')
                                                         <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="ELECCAR" data-toggle="tooltip"
                                                    title="Consummation annuelle de réferenace">CAR</label>
                                                <input type="number" name="ELECCAR" id="ELECCAR" class="form-control"
                                                    placeholder="Consummation annuelle de réferenace   ... " min=0
                                                    maxlength="8" required>
                                                     @error('ELECCAR')
                                                         <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>

                                            <center> <button type="button" class="btn btn-success next-step my-4 col-md-4"
                                                    id="nextButton">Suivant</button></center>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-step" id="step2" style="display:none">
                                    <h5 class="card-header bg-success text-center text-white my-2">
                                        {{ __('Test d\'Eligibilité TICGN') }}
                                    </h5>
                                    <div class="row">
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZvaleurAjouterEuro">Valeur Ajoutée</label>
                                            <input type="number" name="GAZvaleurAjouterEuro" id="GAZvaleurAjouterEuro"
                                                class="form-control" placeholder="votre Code NAF ... " min=0
                                                maxlength="8" required>
                                                 @error('codeNaf')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnGazKwh">Consommation de gaz</label>
                                            <input type="number" name="GAZconsumAnGazKwh" id="GAZconsumAnGazKwh"
                                                class="form-control" placeholder=" la valeur ajoutée ..." min=0
                                                maxlength="8" required>
                                                @error('GAZconsumAnGazKwh')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnElecKwh">Consommation d'électricité</label>
                                            <input type="number" name="GAZconsumAnElecKwh" id="GAZconsumAnElecKwh"
                                                class="form-control"
                                                placeholder="Consummation annulle de referance ( €/Mkw ) " min=0
                                                maxlength="8" required>
                                                @error('GAZconsumAnElecKwh')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZvaleurProduction">Valeur de production</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZvaleurProduction"
                                                id="GAZvaleurProduction" class="form-control" required>
                                                @error('GAZvaleurProduction')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GazachatGaz">Achat de gaz</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZachatGaz" id="GazachatGaz"
                                                class="form-control" required>
                                                @error('GAZachatGaz')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatPetroliers">Achat de pétroliers</label>
                                            <input type="" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZachatPetroliers"
                                                id="GAZachatPetroliers" class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatChaleur">Achat de chaleur</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZachatChaleur"
                                                id="GAZachatChaleur" class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZautres">Autres achats</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZautres" id="GAZautres"
                                                class="form-control" required>
                                                @error('GAZautres')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnAutreKwh">Consommation annuelle autre</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0
                                                maxlength="8" value="1" name="GAZconsumAnAutreKwh"
                                                id="GAZconsumAnAutreKwh" class="form-control" required>
                                                @error('GAZconsumAnAutreKwh')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>

                                        <div class=" col-md-4 form-group ">
                                            <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                                            <input type="nummber" placeholder="0.00" min=0 max=100 value="1"
                                                name="GAZpourcentageConsuPorcessus" id="pourcentageConsuPorcessus"
                                                class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="NaceCode">Code Nace</label>
                                            <input type="number" placeholder="0.00" min=0 maxlength="8"
                                                value="1" name="GAZNaceCode" id="NaceCode" class="form-control"
                                                required>
                                                @error('NaceCode')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>
                                        <div class=" col-md-12 form-group ">
                                            <label for="combustionProcessus">Processus combustion</label>
                                            <select name="GAZcombustionProcessus" id="combustionProcessus"
                                                class="form-control" required>
                                                <option value="true">Oui, Il est soumis au processus de combustion
                                                </option>
                                                <option value="false">Non, Il n'est pas soumis au processus de combustion
                                                </option>
                                            </select>
                                            @error('combustionProcessus')
                                                         <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                        </div>

                                    </div>
                                    <button type="button" class="btn btn-secondary prev-step my-3">Précdent</button>
                                    <button type="submit" class="btn btn-success my-3">Soumettre</button>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

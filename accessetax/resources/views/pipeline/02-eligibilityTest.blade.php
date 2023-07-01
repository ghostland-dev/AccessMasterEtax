@extends('layouts.app')
@section('content')
     @include('layouts.partials.timeline',['step'=>Auth::user()->etape ?? 1])
    <div class=" h-screen   ">


        <div class="container-fluid h-screen bg-gradient-to-t from-slate-500 to-green-500 p-3  ">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="  mt-3 card ">

                        <div class="card-body">

                            <form id="multistep-form" method="POST" action="{{ route('resultsCSPETICGN') }}">
                                @csrf
                                <div class="form-step shadow " id="step1">
                                    <h5 class="card-header bg-success text-center text-white">
                                        Test d'éligibilité CSPE
                                    </h5>

                                    <div class='row p-3'>

                                        <div class="col-md-6 form-group">
                                            <label for="nom_complet">nom complet</label>
                                            <input type="text" name="nom_complet" id="nom_complet" class="form-control"
                                                placeholder="votre nom" required>
                                            @error('nom_complet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="email">Adresse e-mail</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="exemple@domaine.fr" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="tel">Téléphone</label>
                                            <input type="tel" name="tel" id="tel" class="form-control"
                                                placeholder="02 00 00 00 00" required>
                                            @error('tel')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="SIREN">SIREN</label>
                                            <input type="text" name="SIREN" id="SIREN" class="form-control"
                                                placeholder="0000 0000" required>
                                            @error('SIREN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group codeNaf">
                                            <button class="btn btn-success my-3" onclick="event.preventDefault()"
                                                id="getnafGen">Récuperez mon code
                                                NAF</button>
                                        </div>
                                        <div class="col-md-6 form-group codeNaf">

                                            <label for="codeNaf">Code NAF</label>
                                            <input type="text" name="ELECcodeNaf" id="codeNaf" class="form-control"
                                                placeholder="00.00A" required>
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

                                            <button type="button" class="btn btn-success max-auto next-step my-4 col-md-4"
                                                id="nextButton">Suivant</button>
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
                                                class="form-control" placeholder="votre Code NAF ... " min=0 maxlength="8"
                                                required>
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
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZvaleurProduction" id="GAZvaleurProduction"
                                                class="form-control" required>
                                            @error('GAZvaleurProduction')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GazachatGaz">Achat de gaz</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatGaz" id="GazachatGaz" class="form-control"
                                                required>
                                            @error('GAZachatGaz')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatPetroliers">Achat de pétroliers</label>
                                            <input type="" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatPetroliers" id="GAZachatPetroliers"
                                                class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatChaleur">Achat de chaleur</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatChaleur" id="GAZachatChaleur"
                                                class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZautres">Autres achats</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZautres" id="GAZautres" class="form-control"
                                                required>
                                            @error('GAZautres')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnAutreKwh">Consommation annuelle autre</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZconsumAnAutreKwh" id="GAZconsumAnAutreKwh"
                                                class="form-control" required>
                                            @error('GAZconsumAnAutreKwh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class=" col-md-4 form-group ">
                                            <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                                            <input type="number" placeholder="50 %" min="1" max="100"
                                                maxlength=3 value="0" name="GAZpourcentageConsuPorcessus"
                                                id="pourcentageConsuPorcessus" class="form-control" required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="NaceCode">Code Nace</label>
                                            <input type="number" placeholder="0.00" min=0 maxlength="8" value="0"
                                                name="GAZNaceCode" id="NaceCode" class="form-control" required>
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



        <div id="alerte" tabindex="-1"
            class="fixed top-0 left-0 right-0 hidden bg-slate-500   z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center "
            aria-modal="true" role="dialog">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <div class="p-6 text-center">
                        <svg aria-hidden="true"
                            class="mx-auto mb-4 text-red-400 w-14 h-14 animate-pulse dark:text-gray-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h4 id="messageAlerte" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"> </h4>

                        <button data-modal-hide="popup-modal" type="button" id="closeAlert"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            J'ai compris</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

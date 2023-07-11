@extends('layouts.app')
@section('content')
    @include('layouts.partials.timeline', ['step' => Auth::user()->etape ?? 1])
    <div class=" h-screen   ">


        <div class="container-fluid h-screen bg-gradient-to-b from-emerald-400 to-slate-600 p-3  ">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="  mt-3 card  " data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000"
                        data-aos-once="true">

                        <div class="card-body">

                            <form id="multistep-form" method="POST" action="{{ route('resultsCSPETICGN') }}">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-step shadow " data-aos="fade-left" data-aos-delay="200"
                                    data-aos-duration="1000" data-aos-once="true" id="step1">

                                    <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                                        <i class="fa fa-user bg-light text-emerald-400 rounded-full p-2 mx-2"></i> Identité
                                        de client
                                    </h5>


                                    <div class='row p-3'>

                                        <div class="col-md-6 form-group">
                                            <label for="nom_complet">nom complet</label>
                                            <input type="text" name="nom_complet" id="nom_complet"
                                                class="form-control @error('nom_complet') is-invalide @enderror"
                                                placeholder="Nom & prénom ..." required>
                                            @error('nom_complet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="email">Adresse e-mail</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalide @enderror"
                                                placeholder="exemple@domaine.fr" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="tel">Téléphone</label>
                                            <input type="tel" name="tel" id="tel"
                                                class="form-control @error('tel') is-invalide @enderror"
                                                placeholder="02 00 00 00 00" required>
                                            @error('tel')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="SIREN">SIREN</label>
                                            <input type="number" name="SIREN" id="SIREN"
                                                class="form-control @error('SIREN') is-invalide @enderror"
                                                placeholder="0000-0000" required>
                                            @error('SIREN')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 form-group codeNaf ">
                                            <button class="btn btn-success my-3" onclick="event.preventDefault()"
                                                id="getnafGen">Récuperez mon code
                                                NAF</button>
                                        </div>
                                        <div class="col-md-6 form-group codeNaf">

                                            <label for="codeNaf">Code NAF</label>
                                            <input type="text" name="ELECcodeNaf" id="codeNaf"
                                                class="form-control @error('codeNaf') is-invalide @enderror"
                                                placeholder="00.00A" required readonly>
                                            @error('codeNaf')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>

                                        <div class="col-md-12 form-group  ">
                                            <div class="bg-emerald-50 p-2 rounded-md text-center text-emerald-400"> Veuillez
                                                remplire le
                                                champ de <b> siren</b> pour récuperer le code NAF de votre entreprise</div>

                                        </div>
                                        <div id="eligible" class="col-md-12 form-group    ">
                                            <div class="bg-red-50 p-2 rounded-md text-center text-red-400">
                                                <p> Désolé ! votre
                                                    <b>code NAF</b> n'est pas eligible
                                                </p>
                                                <button type="button"
                                                    class="btn btn-success max-auto next-step my-4 col-md-4"
                                                    id="directNext">Suivant</button>
                                            </div>

                                        </div>

                                        <div id="otherFields" style="display: none">

                                            <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                                                <i class="fa fa-plug bg-light text-emerald-400 rounded-full p-2 mx-2"></i>
                                                Test d'éligibilité aux taux
                                                CSPE
                                            </h5>

                                            <div class="col-md-12 form-group">
                                                <label for="ELECvaleurAjouter">Valeur ajoutée</label>
                                                <input type="number" name="ELECvaleurAjouter" id="ELECvaleurAjouter"
                                                    class="form-control @error('ELECvaleurAjouter') is-invalide @enderror"
                                                    placeholder="Valeur ajoutée ... " min=0 maxlength="8" required>
                                                @error('ELECvaleurAjouter')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="ELECCAR" data-toggle="tooltip"
                                                    title="Consummation annuelle de réferenace">CAR</label>
                                                <input type="number" name="ELECCAR" id="ELECCAR"
                                                    class="form-control  @error('ELECCAR') is-invalide @enderror"
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

                                <div class="form-step" id="step2" style="display:none" data-aos="fade-left"
                                    data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">

                                    <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                                        <i class="fa fa-fire bg-light text-emerald-400 rounded-full p-2 mx-2"></i> Test
                                        d'éligibilité aux taux TICGN
                                    </h5>


                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZvaleurAjouterEuro">Valeur Ajoutée</label>
                                            <input type="number" name="GAZvaleurAjouterEuro" id="GAZvaleurAjouterEuro"
                                                class="form-control  @error('GAZvaleurAjouterEuro') is-invalide @enderror"
                                                placeholder="votre Code NAF ... " min=0 maxlength="8" required>
                                            @error('codeNaf')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnGazKwh">Consommation de gaz</label>
                                            <input type="number" name="GAZconsumAnGazKwh" id="GAZconsumAnGazKwh"
                                                class="form-control   @error('GAZconsumAnGazKwh') is-invalide @enderror"
                                                placeholder=" la valeur ajoutée ..." min=0 maxlength="8" required>
                                            @error('GAZconsumAnGazKwh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnElecKwh">Consommation d'électricité</label>
                                            <input type="number" name="GAZconsumAnElecKwh" id="GAZconsumAnElecKwh"
                                                class="form-control  @error('GAZconsumAnElecKwh') is-invalide @enderror"
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
                                                class="form-control  @error('GAZvaleurProduction') is-invalide @enderror"
                                                required>
                                            @error('GAZvaleurProduction')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GazachatGaz">Achat de gaz</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatGaz" id="GazachatGaz"
                                                class="form-control  @error('GAZachatGaz') is-invalide @enderror"
                                                required>
                                            @error('GAZachatGaz')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatPetroliers">Achat de pétroliers</label>
                                            <input type="" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatPetroliers" id="GAZachatPetroliers"
                                                class="form-control  @error('GAZachatPetroliers') is-invalide @enderror"
                                                required>
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZachatChaleur">Achat de chaleur</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZachatChaleur" id="GAZachatChaleur"
                                                class="form-control  @error('GAZachatChaleur') is-invalide @enderror"
                                                required>
                                            @error('GAZachatChaleur')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZautres">Autres achats</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                value="0" name="GAZautres" id="GAZautres"
                                                class="form-control  @error('GAZautres') is-invalide @enderror" required>
                                            @error('GAZautres')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="GAZconsumAnAutreKwh">Consommation annuelle autre</label>
                                            <input type="number" step="0.001" placeholder="0.00" min=0 maxlength="8"
                                                name="GAZconsumAnAutreKwh" id="GAZconsumAnAutreKwh"
                                                class="form-control  @error('GAZconsumAnAutreKwh') is-invalide @enderror"
                                                required>
                                            @error('GAZconsumAnAutreKwh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class=" col-md-4 form-group ">
                                            <label for="pourcentageConsuPorcessus"> Consommation en (%)</label>
                                            <input type="number" placeholder="50 %" min="1" max="100"
                                                maxlength=3 value="0" name="GAZpourcentageConsuPorcessus"
                                                id="pourcentageConsuPorcessus"
                                                class="form-control  @error('GAZpourcentageConsuPorcessus') is-invalide @enderror"
                                                required>
                                            @error('GAZpourcentageConsuPorcessus')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-4 form-group ">
                                            <label for="NaceCode">Code Nace</label>
                                            <input type="number" placeholder="0.00" min=0 maxlength="8"
                                                name="GAZNaceCode" id="NaceCode"
                                                class="form-control  @error('NaceCode') is-invalide @enderror" required>
                                            @error('NaceCode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" col-md-12 form-group ">
                                            <label for="combustionProcessus">Processus combustion</label>
                                            <select name="GAZcombustionProcessus" id="combustionProcessus"
                                                class="form-control  @error('combustionProcessus') is-invalide @enderror "
                                                required>
                                                <option>Selectionner le processus de combustion </option>
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

        @include('error.message')


    </div>
@endsection

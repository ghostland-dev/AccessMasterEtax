@extends('layouts.app')
@section('content')
    <div class=" fullheight centred  h-screen bg-gradient-to-t from-slate-500 to-green-500">
        <div class="container p-4 card ">


            <div class="row justify-content-center  ">

                <div class="col-md-6  ">
                    <h5 class="card-header bg-success text-center text-white">{{ __('Test d\'Eligibilité CSPE') }}</h5>

                    <form method="POST" action="{{ route('ValidationCSPE') }}" class=" ">
                        @csrf
                        @method('POST')
                        <div id="formsContainer">
                            <div class="shadow-md  p-2 grid lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1 py-4 my-3">
                                <div class="  p-2  ">
                                    <label for="codeNaf"
                                        class="  col-form-label text-md-right">{{ __('Code NAF') }}</label>

                                    <div class=" ">
                                        <input id="codeNaf" type="text" class="form-control" name="codeNaf"
                                            value="{{ old('codeNaf') }}" placeholder="0.00" required autocomplete="codeNaf"
                                            autofocus>
                                    </div>
                                </div>

                                <div class="  p-2   ">
                                    <label for="valeurAjouter"
                                        class="  col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>

                                    <div class=" ">
                                        <input id="valeurAjouter" type="number" class="form-control" name="valeurAjouter"
                                            value="{{ old('valeurAjouter') }}" placeholder="0.00" required
                                            autocomplete="valeurAjouter">
                                    </div>
                                </div>

                                <div class="  p-2   ">
                                    <label for="CAR" class="  col-form-label text-md-right">{{ __('CAR') }}</label>

                                    <div class=" ">
                                        <input id="CAR" type="number" class="form-control" placeholder="0.00"
                                            name="CAR" value="{{ old('CAR') }}" required autocomplete="CAR">
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class=" max-auto my-3   ">

                            <button type="submit" class="btn btn-success m-2">
                                {{ __('lancez le teste d\'éligibilité') }} <i class="fa fa-arrow-right  "
                                    aria-hidden="true"></i>
                            </button>

                        </div>
                    </form>




                </div>




                <div class="col-md-6">
                    <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                        <i class="fa fa-plug bg-light text-emerald-400 rounded-full p-2 mx-2"></i>
                        Resultats de test aux remboursement des taux
                        CSPE
                    </h5>
                    <ul class="gap-2 p-2">
                        @if (isset($CodeNafmessage))
                            @if (isset(Auth::user()->id))
                                <li<
                                    class="{{ $MotnantCSPETauxReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong>Montant CSPE Reduit :</strong> <span id="Validation01">
                                        {{ $MotnantCSPETauxReduit ? " $MotnantCSPETauxReduit €" : 'Désolé, Vous votre taux ne peux pas être nullable ' }}</span>
                                    </li>
                                    <li
                                        class='{{ $CSPEtauxPlein > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}'>
                                        <strong>Montant CSPE plein :</strong> <span id="Validation01">
                                            {{ $CSPEtauxPlein ? " $CSPEtauxPlein  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                                    </li>
                                    <li
                                        class="{{ $EligibiliteReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                        <strong>Eligibilité taux réduit :</strong> <span id="Validation01">
                                            {{ $EligibiliteReduit ? " $EligibiliteReduit  %" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                                    </li>
                                    <li
                                        class="{{ $RatioElectroIntense > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                        <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                                            {{ $RatioElectroIntense ? " $RatioElectroIntense  €" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                                    </li>
                                    <li
                                        class='{{ $SoumisRisqueFuitCO2 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}'>
                                        <strong>Soumis à risque de fuite Carbone :</strong> <span id="Validation01">
                                            {{ $SoumisRisqueFuitCO2 ? ': Oui, vous êtes soumis au risque fuite carbon' : " Non, vous n\"êtes pas soumis au risque carbon" }}</span>
                                    </li>
                                    <li
                                        class="{{ $NouveaTauxReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                        <strong>Nouveux taux réduit :</strong> <span id="Validation01">
                                            {{ $NouveaTauxReduit ? " $NouveaTauxReduit  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                                    </li>

                                    <li
                                        class="{{ $RemboursementClient > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                        <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                                            {{ $RemboursementClient ? " $RemboursementClient  €" : 'Désolé, Vous votre taux ne peux pas être nullable' }}</span>
                                    </li>

                                    <li class="bg-light-dark text-success p-4 my-2">
                                        <strong> le client sera remboursé de : <h6 class="text-dark"
                                                id="estimationEconomie ">
                                                {{ $RemboursementClient }} € </h6></strong>
                                        <hr>
                                        <strong>Nouveau taux réduit : <h6 class="text-dark" id="estimationEconomie ">
                                                {{ $NouveaTauxReduit }} € </h6></strong>
                                        <hr>
                                        <strong> Frais de la préstation pour Access Energies : <h4 class="text-dark"
                                                id="estimationEconomie ">
                                                {{ $RemboursementClient * 0.2 }} € </h4></strong>
                                        <hr>
                                    </li>
                                @elseif ($RemboursementClient * 0.2 > 10)
                                    <li class="bg-light-dark text-success p-4 my-2">
                                        <strong> le client sera remboursé de : <h6 class="text-dark"
                                                id="estimationEconomie ">
                                                {{ $RemboursementClient }} € </h6></strong>
                                        <hr>
                                        <strong>Nouveau taux réduit : <h6 class="text-dark" id="estimationEconomie ">
                                                {{ $NouveaTauxReduit }} € </h6></strong>
                                        <hr>
                                        <strong> Frais de la préstation pour Access Energies : <h4 class="text-dark"
                                                id="estimationEconomie ">
                                                {{ $RemboursementClient * 0.2 }} € </h4></strong>
                                        <hr>
                                    </li>
                                @else
                                    <li class="bg-light-success text-success p-4 my-2">

                                        <strong class="text-emerald-400">Félicitation:</strong> <span
                                            id="estimationEconomie">
                                            {{ __(' Vous êtes éligible au rembouresement CSPE ') }}
                                        </span>

                                    </li>
                            @endif
                        @elseif (!isset($CodeNafmessage))
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
@endsection

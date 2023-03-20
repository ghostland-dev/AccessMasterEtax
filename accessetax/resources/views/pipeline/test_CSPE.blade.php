@extends('layouts.app')

@section('content')
    <div class=" fullheight centred ">
        <div class="container px-6 pt-3 card ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <h5 class="card-header bg-success text-center text-white">{{ __('Test d\'Eligibilité CSPE') }}</h5>

                        <div class="card-body">
                            <form method="POST" action="{{ route('ValidationCSPE') }}">
                                @csrf

                                <div class="form-group my-2 row">
                                    <label for="codeNaf"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Code NAF') }}</label>

                                    <div class="col-md-6">
                                        <input id="codeNaf" type="text" class="form-control" name="codeNaf"
                                            value="{{ old('codeNaf') }}" required autocomplete="codeNaf" autofocus>
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label for="valeurAjouter"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>

                                    <div class="col-md-6">
                                        <input id="valeurAjouter" type="text" class="form-control" name="valeurAjouter"
                                            value="{{ old('valeurAjouter') }}" required autocomplete="valeurAjouter">
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label for="CAR"
                                        class="col-md-4 col-form-label text-md-right">{{ __('CAR') }}</label>

                                    <div class="col-md-6">
                                        <input id="CAR" type="text" class="form-control" name="CAR"
                                            value="{{ old('CAR') }}" required autocomplete="CAR">
                                    </div>
                                </div>

                                <div class="form-group my-2 row ">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('lancez le teste d\'éligibilité ') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="results mt-5 card bg-light-indigo text-primary p-2 text-center">
                                @if (isset($CodeNafmessage))
                                    {!! $CodeNafmessage !!}
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="bg-success text-center p-2 rounded-2  text-bg-muted m-3 wow">Tester d'éligibilité aux taux
                        CSPE
                    </h4>
                    <ul class="gap-2 p-2">
                        @if (isset($CodeNafmessage))
                            <li
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
                                <strong> le client sera remboursé de : <h6 class="text-dark" id="estimationEconomie ">
                                        {{ $RemboursementClient }} € </h6></strong>
                                <hr>
                                <strong>Nouveau taux réduit : <h6 class="text-dark" id="estimationEconomie ">
                                        {{ $NouveaTauxReduit }} € </h6></strong>
                                <hr>
                                <strong> Frais de la préstation pour Voltaria : <h4 class="text-dark"
                                        id="estimationEconomie ">
                                        {{ $RemboursementClient * 0.2 }} € </h4></strong>
                                <hr>
                            </li>
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

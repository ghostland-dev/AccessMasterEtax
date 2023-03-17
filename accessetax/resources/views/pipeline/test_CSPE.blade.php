@extends('layouts.app')

@section('content')
    <div class=" py-8 bg-dark-light">
        <div class="container pt-3 card ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ __('Test d\'Eligibilité CSPE') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('ValidationCSPE') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="codeNaf"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Code NAF') }}</label>

                                    <div class="col-md-6">
                                        <input id="codeNaf" type="text" class="form-control" name="codeNaf"
                                            value="{{ old('codeNaf') }}" required autocomplete="codeNaf" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="valeurAjouter"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>

                                    <div class="col-md-6">
                                        <input id="valeurAjouter" type="text" class="form-control" name="valeurAjouter"
                                            value="{{ old('valeurAjouter') }}" required autocomplete="valeurAjouter">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="CAR"
                                        class="col-md-4 col-form-label text-md-right">{{ __('CAR') }}</label>

                                    <div class="col-md-6">
                                        <input id="CAR" type="text" class="form-control" name="CAR"
                                            value="{{ old('CAR') }}" required autocomplete="CAR">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Tester') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="results mt-5">
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
                                    {{ $MotnantCSPETauxReduit ? ": $MotnantCSPETauxReduit €" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>
                            <li
                                class="{{ $CSPEtauxPlein > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Montant CSPE plein :</strong> <span id="Validation01">
                                    {{ $CSPEtauxPlein ? ": $CSPEtauxPlein  €" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>
                            <li
                                class="{{ $EligibiliteReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Eligibilité taux réduit :</strong> <span id="Validation01">
                                    {{ $EligibiliteReduit ? ": $EligibiliteReduit  %" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>
                            <li
                                class="{{ $RatioElectroIntense > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                                    {{ $RatioElectroIntense ? ": $RatioElectroIntense  €" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>
                            <li
                                class="{{ $SoumisRisqueFuitCO2 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Etape 1 (Code Nace):</strong> <span id="Validation01">
                                    {{ $SoumisRisqueFuitCO2 ? ": 'Oui, vous êtes soumis à cette constante' " : 'Non, vous n\'êtes pas soumis à cette constante' }}</span>
                            </li>
                            <li
                                class="{{ $NouveaTauxReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                                    {{ $NouveaTauxReduit ? ": $NouveaTauxReduit  €" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>

                            <li
                                class="{{ $RemboursementClient > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                                    {{ $RemboursementClient ? ": $RemboursementClient  €" : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                            </li>

                            <li class="bg-light-dark text-success p-4 my-2">
                                <strong> le client sera remboursé de : <h6 class="text-dark" id="estimationEconomie ">
                                        {{ $RemboursementClient }} € </h6></strong>
                                <hr>
                                <strong>Nouveau taux réduit : <h6 class="text-dark" id="estimationEconomie ">
                                        {{ $NouveaTauxReduit }} € </h6></strong>
                                <hr>
                                <strong> Frais de la préstation : <h4 class="text-dark" id="estimationEconomie ">
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

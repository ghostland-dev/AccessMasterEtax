@extends('layouts.app')

@section('content')

@php
 $step =2;
@endphp
 @include('layouts.partials.timeline')
 
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="   centred ">
                    <div class="container px-6 pt-3 card ">
                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <h4 class="bg-success text-center p-2 rounded-2  text-bg-muted m-3 wow">
                                    Tester d'éligibilité aux taux
                                    CSPE
                                </h4>
                                <ul class="gap-2 p-2">
                                    @if (isset($CodeNafmessage) && $RemboursementClient > 1)
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
                                            <strong>Soumis à risque de fuite Carbone :</strong>
                                            <span id="Validation01">
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
                                            <strong> Frais de la préstation pour Access Energies :
                                                <h4 class="text-dark" id="estimationEconomie ">
                                                    {{ $RemboursementClient * 0.2 }} € </h4>
                                            </strong>
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


                            <div class="col-md-6">
                                <div class=" mt-3">

                                    <h4 class="bg-success text-center p-2 rounded-2  text-bg-muted m-3 wow">
                                        Tester d'éligibilité aux
                                        taux
                                        TICGN</h4>
                                    <ul class=" p-4">
                                        @if (isset($fullvalidation) && $esitmationEconomie > 1 )
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
                                                        {{ $SommeTotalTaxGazPlein }} € Hors TVA
                                                    </h6></strong>
                                                <hr>
                                                <strong>Somme total des taux électricité plein: <h6 class="text-dark"
                                                        id="estimationEconomie ">
                                                        {{ $SommeTotalTaxElecPlein }} € Hors TVA
                                                    </h6></strong>
                                                <hr>
                                                <strong>Estimation de remboursement: <h4 class="text-dark"
                                                        id="estimationEconomie ">
                                                        {{ $esitmationEconomie }} € Hors TVA</h4>
                                                </strong>
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

                                         <a href="{{ route('etape3') }}" class="btn btn-dark my-3 py-2 w-100"><i class="fa fa-send"></i> Poursuivre</a>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

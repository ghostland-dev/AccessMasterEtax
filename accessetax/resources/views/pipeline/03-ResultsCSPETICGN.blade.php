@extends('layouts.pipeline')
@section('pipeline')

    @include('layouts.partials.timeline',['step'=>Auth::user()->etape ?? 2])
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container-fluid   bg-gradient-to-t from-slate-500 to-green-500 h-screen ">

        <div class="container px-6 pt-3    ">
            <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-2">

                <div class=" my-3 p-3 card">
                    <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                        <i class="fa fa-plug bg-light text-emerald-400 rounded-full p-2 mx-2"></i> Résultats de Test
                        d'éligibilité aux
                        taux
                        CSPE
                    </h5>


                    <ul class="gap-2 p-2">
                        @if (isset($CodeNafmessage) && $RemboursementClient > 1)
                            @if (isset(Auth::user()->role) && Auth::user()->role == 'commercial')
                                <li
                                    class="{{ $MotnantCSPETauxReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Montant CSPE Reduit :</strong> <span id="Validation01">
                                        {{ $MotnantCSPETauxReduit ? " $MotnantCSPETauxReduit €" : 'Désolé, Vous votre taux ne peux pas être nullable ' }}</span>
                                </li>
                                <li
                                    class='{{ $CSPEtauxPlein > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}'>
                                    <strong class="text-slate-500 ">Montant CSPE plein :</strong> <span id="Validation01">
                                        {{ $CSPEtauxPlein ? " $CSPEtauxPlein  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                                </li>
                                <li
                                    class="{{ $EligibiliteReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Eligibilité taux réduit :</strong> <span
                                        id="Validation01">
                                        {{ $EligibiliteReduit ? " $EligibiliteReduit  %" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                                </li>
                                <li
                                    class="{{ $RatioElectroIntense > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Ratio Electro-intensité :</strong> <span
                                        id="Validation01">
                                        {{ $RatioElectroIntense ? " $RatioElectroIntense  €" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                                </li>
                                <li
                                    class='{{ $SoumisRisqueFuitCO2 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}'>
                                    <strong class="text-slate-500 ">Soumis à risque de fuite Carbone :</strong>
                                    <span id="Validation01">
                                        {{ $SoumisRisqueFuitCO2 ? ': Oui, vous êtes soumis au risque fuite carbon' : " Non, vous n\"êtes pas soumis au risque carbon" }}</span>
                                </li>
                                <li
                                    class="{{ $NouveaTauxReduit > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Nouveux taux réduit :</strong> <span id="Validation01">
                                        {{ $NouveaTauxReduit ? " $NouveaTauxReduit  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                                </li>

                                <li
                                    class="{{ $RemboursementClient > 0 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Ratio Electro-intensité :</strong> <span
                                        id="Validation01">
                                        {{ $RemboursementClient ? " $RemboursementClient  €" : 'Désolé, Vous votre taux ne peux pas être nullable' }}</span>
                                </li>

                                <li
                                    class="bg-light text-success results p-4 my-2 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-3 blur-sm">
                                    <div class="shadow-md">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">le client sera
                                            remboursé de

                                        </p>
                                        <h5 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $RemboursementClient }} € </h5>
                                    </div>



                                    <div class="shadow-md">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">Frais de la
                                            préstation </p>
                                        <h5 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $RemboursementClient * 0.1 * 0.2 }} € </h5>
                                    </div>

                                    <div class="shadow-md">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">Nouveau taux
                                            réduit </p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $NouveaTauxReduit }} € </h6>
                                    </div>
                                </li>
                            @else
                                <li class="bg-light-success text-success p-4 my-2">

                                    <strong class="text-slate-500 ">Rappel:</strong> <span id="estimationEconomie">
                                        Féliciations vous êtes eligible au CSPE
                                    </span>

                                </li>
                            @endif
                        @elseif (!isset($CodeNafmessage))
                            <li class="bg-light-warning text-warning p-4 my-2">

                                <strong class="text-slate-500 ">Rappel:</strong> <span id="estimationEconomie">
                                    {{ __('Veuillez remplissez la formulaire pour faire afficher les résulats  ') }}
                                </span>

                            </li>
                        @else
                            <li class="bg-light-danger text-danger p-4 my-2">

                                <strong class="text-slate-500 ">Estimation de remboursement:</strong> <span
                                    id="estimationEconomie">
                                    {{ __('Désolé, nous ne remplessez pas les créteres pour bénéficier des taux de remboursement TICGN  ') }}
                                </span>

                            </li>
                        @endif

                        <a href="{{ route('remerciement') }}" class="btn btn-success  my-3 py-2 w-100"><i
                                class="fa fa-send"></i>
                            Poursuivre</a>
                    </ul>


                </div>


                <div class=" my-3 p-3 card">


                    <h5 class="bg-slate-500 text-center p-3 rounded-2  text-white  m-3 wow">
                        <i class="fa fa-fire bg-light text-emerald-400 rounded-full p-2 mx-2"></i> Résultats de Test
                        d'éligibilité aux
                        taux
                        TICGN
                    </h5>
                    <ul class="   ">
                        @if (isset($fullvalidation) && $esitmationEconomie > 1)
                            @if (isset(Auth::user()->role) && Auth::user()->role == 'commercial')
                                <li
                                    class="{{ $Validation01 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Etape 1 (Code Nace):</strong> <span id="Validation01">
                                        {{ $Validation01 ? 'Super ! bien réussi .' : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                                </li>
                                <li
                                    class="{{ $Validation02 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Etape 2 (Combustion):</strong> <span id="Validation02">
                                        {{ $Validation02 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                                </li>
                                <li
                                    class="{{ $Validation03 ? 'bg-light-success text-success p-2 my-2 rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                                    <strong class="text-slate-500 ">Etape 3 (Code Taux):</strong> <span id="Validation03">
                                        {{ $Validation03 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                                </li>

                                <li
                                    class="bg-light text-success results p-4 my-2 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-3 blur-sm">


                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">
                                            Taux gaz plein</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $SommeTotalTaxGazPlein }} € </h6>
                                    </div>
                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">
                                            Taux électricité plein</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $SommeTotalTaxElecPlein }} € </h6>
                                    </div>
                                    <div class="shadow-md ">
                                        <p class="text-white text-md bg-success p-2 rounded-md  text-center">Estimation de
                                            remboursement</p>
                                        <h6 class="text-slate-400 text-bold text-center" id="estimationEconomie ">
                                            {{ $esitmationEconomie }} € </h6>
                                    </div>



                                </li>
                            @else
                                <li class="bg-light-success text-success p-4 my-2">

                                    <strong class="text-slate-500 ">Rappel:</strong> <span id="estimationEconomie">
                                        Féliciations vous êtes eligible au TICGN
                                    </span>

                                </li>
                            @endif
                        @elseif (!isset($fullvalidation))
                            <li class="bg-light-warning text-warning p-4 my-2">

                                <strong class="text-slate-500 ">Rappel:</strong> <span id="estimationEconomie">
                                    {{ __('Veuillez remplissez la formulaire pour faire afficher les résulats  ') }}
                                </span>

                            </li>
                        @else
                            <li class="bg-light-danger text-danger p-4 my-2">

                                <strong class="text-slate-500 ">Estimation de remboursement:</strong> <span
                                    id="estimationEconomie">
                                    {{ __('Désolé, nous ne remplessez pas les créteres pour bénéficier des taux de remboursement TICGN  ') }}
                                </span>

                            </li>
                        @endif

                        <a href="{{ route('remerciement') }}" class="btn btn-success  my-3 py-2 w-100"><i
                                class="fa fa-send"></i>
                            Poursuivre</a>
                    </ul>

                </div>

            </div>
        </div>

    </div>

    <script>
        document.querySelector('.results').addEventListener('click', function() {
            $('.results').remove();
            return false;
        });
    </script>
@endsection

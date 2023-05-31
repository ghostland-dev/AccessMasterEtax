@extends('layouts.signed')
@section('main')
    <div class="col-md-12">
        <div class="card mt-3 min-vh-50  ">
            <h4 class="text-center  p-3 rounded-t-md bg-success text-white text-xl  "> Resultats de teste CSPE
            </h4>
            <ul class="grid grid-cols-3 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-2 p-3">
                @if (isset($EligibiliteCSPE))
                    <li
                        class="  p-3 {{ $EligibiliteCSPE->MotnantCSPETauxReduit > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-3 my-2 rounded ' }}">
                        <strong class="text-center ">Montant CSPE Reduit :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->MotnantCSPETauxReduit ? " $EligibiliteCSPE->MotnantCSPETauxReduit €" : 'Désolé, Vous votre taux ne peux pas être nullable ' }}</span>
                    </li>
                    <li
                        class=" p-3 {{ $EligibiliteCSPE->CSPEtauxPlein > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-3 my-2 rounded ' }}">
                        <strong class="text-center ">Montant CSPE plein :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->CSPEtauxPlein ? " $EligibiliteCSPE->CSPEtauxPlein  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                    </li>
                    <li
                        class=" p-3 {{ $EligibiliteCSPE->EligibiliteReduit > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-3 my-2 rounded ' }}">
                        <strong class="text-center ">Eligibilité taux réduit :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->EligibiliteReduit ? " $EligibiliteCSPE->EligibiliteReduit  %" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                    </li>
                    <li
                        class=" p-3 {{ $EligibiliteCSPE->RatioElectroIntense > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-3 my-2 rounded ' }}">
                        <strong class="text-center ">Ratio Electro-intensité :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->RatioElectroIntense ? " $EligibiliteCSPE->RatioElectroIntense  €" : "Désolé, Vous n\"avez pas réussi le teste de type d\"activité " }}</span>
                    </li>
                    <li
                        class=" p-3 {{ $EligibiliteCSPE->SoumisRisqueFuitCO2 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                        <strong class="text-center ">Soumis à risque de fuite Carbone :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->SoumisRisqueFuitCO2 ? ': Oui, vous êtes soumis au risque fuite carbon' : " Non, vous n\"êtes pas soumis au risque carbon" }}</span>
                    </li>
                    <li
                        class=" p-2 {{ $EligibiliteCSPE->NouveaTauxReduit > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                        <strong>Nouveux taux réduit :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->NouveaTauxReduit ? " $EligibiliteCSPE->NouveaTauxReduit  €" : 'Désolé, Vous votre taux ne peux pas être nullable  ' }}</span>
                    </li>

                    <li
                        class=" p-2 {{ $EligibiliteCSPE->RemboursementClient > 0 ? ' bg-slate-50 p-3  text-success  rounded ' : 'bg-light-danger text-danger p-2 my-2 rounded ' }}">
                        <strong>Ratio Electro-intensité :</strong> <span id="Validation01">
                            {{ $EligibiliteCSPE->RemboursementClient ? " $EligibiliteCSPE->RemboursementClient  €" : 'Désolé  , Vous votre taux ne peux pas être nullable' }}</span>
                    </li>

                    <li class=" grid grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1     gap-2">

                        <div class="bg-gray-50 text-left  rounded">
                            <p class="text-center bg-slate-400 p-2 text-white rounded-t-md "> Economie client
                                </p>
                            <p class="text-gray-400 text-xl text-center" id="estimationEconomie ">
                                {{ $EligibiliteCSPE->RemboursementClient }} €
                            </p>
                        </div>


                        <div class="bg-gray-50 text-left  rounded">
                            <p class="text-center bg-slate-400 p-2 text-white rounded-t-md "> Taux réduit optimisé </p>
                            <p class="text-gray-400 text-xl text-center" id="estimationEconomie ">
                                {{ $EligibiliteCSPE->NouveaTauxReduit }} €
                            </p>
                        </div>


                        <div class="bg-gray-50 text-left  rounded">
                            <p class="text-center bg-slate-400 p-2 text-white rounded-t-md "> Frais de la préstation </p>

                            <p class="text-gray-400 text-xl text-center" id="estimationEconomie ">
                                {{ $EligibiliteCSPE->RemboursementClient }} € </p>
                        </div>


                    </li>
                @elseif (!isset($EligibiliteCSPE->CodeNafmessage))
                    <li class="bg-light-warning text-warning
                     my-2">

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
@endsection

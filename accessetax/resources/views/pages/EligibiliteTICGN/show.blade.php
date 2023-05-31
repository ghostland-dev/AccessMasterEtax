@extends('layouts.signed')
@section('main')
    <div class="col-md-12">
        <div class=" mt-3">

            <h4 class="bg-success text-center p-3  rounded-2  text-bg-muted m-3 wow">Tester d'éligibilité aux
                taux
                TICGN</h4>
            <ul class=" p-4">
                @if (isset($EligibiliteTICGN))
                    <div class="grid  grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-2">
                        <li
                            class="p-3 my-2 rounded-md {{ $EligibiliteTICGN->Validation01 ? 'bg-light-success text-success   ' : 'bg-light-danger text-danger   ' }}">
                            <p class="text-slate-400 font-semibold">Etape 1 (Code Nace):</p> <span id="Validation01">
                                {{ $EligibiliteTICGN->Validation01 ? 'Super ! bien réussi .' : 'Désolé, Vous n\'avez pas réussi le teste de type d\'activité ' }}</span>
                        </li>
                        <li
                            class="p-3 my-2 rounded-md {{ $EligibiliteTICGN->Validation02 ? 'bg-light-success text-success   ' : 'bg-light-danger text-danger   ' }}">
                            <p class="text-slate-400 font-semibold">Etape 2 (Combustion):</p> <span id="Validation02">
                                {{ $EligibiliteTICGN->Validation02 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                        </li>
                        <li
                            class="p-3 my-2 rounded-md {{ $EligibiliteTICGN->Validation03 ? 'bg-light-success text-success   ' : 'bg-light-danger text-danger   ' }}">
                            <p class="text-slate-400 font-semibold">Etape 3 (Code Taux):</p> <span id="Validation03">
                                {{ $EligibiliteTICGN->Validation03 ? 'Super ! bien réussi .' : ' Désolé, Vous n\'avez pas réussi le teste de processus de combusition ' }}</span>
                        </li>

                    </div>

                    <li class="grid  grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-2">
                        <div class="shadow-md p-3 bg-gray-50 text-gray">
                            <p>Somme total des taux gaz plein </p>
                            <h6 class="text-emerald-400" id="estimationEconomie ">
                                {{ $EligibiliteTICGN->SommeTotalTaxGazPlein }} € Hors TVA</h6>
                        </div>

                        <div class="shadow-md p-3 bg-gray-50 text-gray">
                            <p>Somme total des taux électricité plein:</p>
                            <h6 class="text-emerald-400" id="estimationEconomie ">
                                {{ $EligibiliteTICGN->SommeTotalTaxElecPlein }} € Hors TVA</h6>
                        </div>

                        <div class="shadow-md p-3 bg-gray-50 text-gray">
                            <p>Estimation de remboursement</p>
                            <h6 class="text-emerald-400" id="estimationEconomie ">
                                {{ $EligibiliteTICGN->esitmationEconomie }} € Hors TVA</h6>
                        </div>

                    </li>
                    <li class="grid my-3  grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-4">



                        <div class="shadow-md p-3 rounded-md  bg-slate-50 text-gray text-center">
                            <p class="text-slate-400 font-semibold">Chiffre d'affaire Brut</p>
                            <h6 class="text-emerald-300 text-xl  " id="estimationEconomie ">
                                {{ $EligibiliteTICGN->chiffreAffaireBrut_AE }} € Hors TVA</h6>
                        </div>

                        <div class="shadow-md p-3 rounded-md  bg-slate-50 text-gray text-center">
                            <p class="text-slate-400 font-semibold">Chiffre d'affaire Net</p>
                            <h6 class="text-emerald-300 text-xl  " id="estimationEconomie ">
                                {{ $EligibiliteTICGN->chiffreAffaireNet_AE }} € Hors TVA</h6>
                        </div>

                    </li>
                @elseif (!isset($EligibiliteTICGN->fullvalidation))
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
@endsection

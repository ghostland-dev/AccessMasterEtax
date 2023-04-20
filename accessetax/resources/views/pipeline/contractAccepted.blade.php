@extends('layouts.app')

@section('content')
@php
 $step =4;
@endphp

@include('layouts.partials.timeline')



<div class="  centred bg-light">
    <div class="container-fluid   pt-4  ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <h5 class="card-header bg-dark text-center text-white">{{ __('Documents à fournir') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ValidationCSPE') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                              
                            <div class="file-upload">
                                <label class="file-label">
                                  Bilans Comptables (2 an) :
                                  <input class="file-input form-control" type="file" name="bilans" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>
                              
                              <div class="file-upload">
                                <label class="file-label">
                                  CERFA - la valeur ajoutée:
                                  <input class="file-input form-control" type="file" name="cerfa" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  12 x factures:
                                  <input class="file-input form-control" type="file" name="factures" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  RIB :
                                  <input class="file-input form-control" type="file" name="rib" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  KBIS :
                                  <input class="file-input form-control" type="file" name="kbis" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  Contrat de préstation :
                                  <input class="file-input form-control" type="file" name="contrat" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  Attestation manuscrite (signée) :
                                  <input class="file-input form-control" type="file" name="attestation" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  Mandataire ou Pouvoir :
                                  <input class="file-input form-control" type="file" name="mandataire" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>

                              <div class="file-upload">
                                <label class="file-label">
                                  CGV Voltaria :
                                  <input class="file-input form-control" type="file" name="cgv" accept=".pdf">
                                </label>
                                <div class="progress-bar">
                                  <div class="progress"></div>
                                </div>
                              </div>


                            <div class="file-upload form-group my-2 row ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Envoyer mes documents') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header bg-success text-center text-white">{{ __('Statut de dossier') }}</h5>

                    <ul class="gap-2 p-2">

                        <li class="bg-light-warning text-warning   p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>Bilans Comptables (2 an) :</strong> <span id="2BillansComptables">
                                {{ __(' Billans comptables des 2 dernieres années ') }}
                            </span>

                        </li>
                        <li class="bg-light-warning text-warning p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>CERFA - la valeur ajoutée:</strong> <span id="ValeurAjouter">
                                {{ __(' Merci de fournir ce document signé ') }}
                            </span>

                        </li>
                        <li class="bg-light-warning text-warning p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong> 12 x factures:</strong> <span id="12FacturesElec">
                                {{ __(' factures d\'éléctrcité des 12 derniers mois ') }}
                            </span>

                        </li>
                        <li class="bg-light-warning text-warning p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i><strong>RIB :</strong> <span id="RIB">
                                {{ __(' la société qui recevra le remboursement') }}
                            </span>

                        </li>

                        <li class="bg-light-warning text-warning p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i><strong>KBIS :</strong> <span id="RIB">
                                {{ __(' la société qui recevra le remboursement') }}
                            </span>

                        </li>

                        <li class="bg-light-warning text-warning   p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>Contrat de préstation :</strong> <span id="ContratPrestation">
                                {{ __('Merci de fournir ce document signé') }}
                            </span>

                        </li>

                        <li class="bg-light-warning text-warning   p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>Attestation manuscrite (signée) :</strong> <span id="estimationEconomie">
                                {{ __('Attestation manuscrite de non-répercussion de la taxe ') }}
                            </span>

                        </li>

                        <li class="bg-light-warning text-warning   p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>Mandataire ou Pouvoir :</strong> <span id="estimationEconomie">
                                {{ __('Merci de fournir ce document signé et écrit en main') }}
                            </span>

                        </li>

                        <li class="bg-light-warning text-warning   p-3 my-2">

                            <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times" aria-hidden="true"></i> <strong>CGV Voltaria :</strong> <span id="estimationEconomie">
                                {{ __('Merci de fournir ce document signé et écrit en main') }}
                            </span>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
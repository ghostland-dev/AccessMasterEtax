@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class=" shadow-md bg-slate-700 rounded-md p-4   text-success">Détail de la facture</h3>

                    <div class=" grid gap-3 grid-cols-2 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2   text-center ">
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                            {{ $FactureElec->numero_compteur }}
                        </p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                            {{ $FactureElec->numero_client }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                            {{ $FactureElec->consommation }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                            {{ $FactureElec->annee }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                :</b>
                            {{ $FactureElec->Elec_contract_id }}</p>

                    </div>
                    <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">
                        <object data="{{ $FactureElec->fichier }}" type="application/pdf" width="100%" height="500px">
                            <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                                    href="{{ $FactureElec->fichier }}">Télécharger</a>
                                pour visualuser.</p>
                        </object>

                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1  ">
                <div class="shadow my-2">
                    <div class="card-body">
                        <h4 class=" shadow-md bg-slate-700 rounded-md p-4   text-success">Contrat de Elec Asoccié</h4>

                        <div
                            class=" grid  my-2 gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2   text-center ">
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                                {{ $FactureElec->Eleccontract->nom_contrat }}
                            </p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                                {{ $FactureElec->Eleccontract->nom_contrat }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                                {{ $FactureElec->Eleccontract->nom_contrat }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                                {{ $FactureElec->Eleccontract->nom_contrat }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                    :</b>
                                {{ $FactureElec->Eleccontract->nom_contrat }}</p>
                        </div>

                    </div>

                </div>
                <div class="shadow  ">
                    <div class="card-body">
                        <h4 class=" shadow-md bg-slate-700 rounded-md p-4 text-success   ">Compteur de Elec Asoccié</h4>

                        <div
                            class=" grid  my-2 gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2   text-center ">
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                                {{ $FactureElec->Eleccontract->ElecMeter->nom_compteur }}

                            </p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                                {{ $FactureElec->Eleccontract->ElecMeter->nom_compteur }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                                {{ $FactureElec->Eleccontract->ElecMeter->nom_compteur }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                                {{ $FactureElec->Eleccontract->ElecMeter->nom_compteur }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                    :</b>
                                {{ $FactureElec->Eleccontract->ElecMeter->nom_compteur }}</p>
                        </div>

                    </div>
                </div>

            </div>
            <a href="{{ route('billsElecs') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
@endsection

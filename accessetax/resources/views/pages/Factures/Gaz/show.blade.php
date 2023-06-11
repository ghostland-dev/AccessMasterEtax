@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="  bg-success rounded-md p-4 flex justify-between ">
                        <h3 class="text-white">Détail de la facture</h3>
                    </div>




                    <div class=" grid  my-2 gap-3 grid-cols-1 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-2   text-center ">

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                    :</b> </p>
                            <p> {{ $FactureGaz->Gazcontract->nom_contrat }} </p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° Clinet :</b>
                            </p>
                            <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Consummation
                                    :</b>
                            </p>
                            <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                        </div>

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année :</b></p>
                            <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Contrat
                                    de gaz :</b>
                            </p>
                            <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                        </div>

                    </div>






                    <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">
                        <object data="{{ $FactureGaz->fichier }}" type="application/pdf" width="100%" height="500px">
                            <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                                    href="{{ $FactureGaz->fichier }}">Télécharger</a>
                                pour visualuser.</p>
                        </object>

                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1  ">
                <div class="shadow  ">
                    <div class="card-body">


                        <div class="  bg-success rounded-md p-4 flex justify-between ">
                            <h3 class="text-white">Contrat de Gaz Asoccié</h3>
                            <a href="{{ route('contractGaz.show', $FactureGaz->Gazcontract->id) }}"
                                class="bg-slate-50 p-2 rounded-full text-white"><i
                                    class=" text-emerald-400 fa fa-eye"></i></a>
                        </div>



                        <div
                            class=" grid  my-2 gap-3 grid-cols-1 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-2   text-center ">

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                        :</b> </p>
                                <p> {{ $FactureGaz->Gazcontract->nom_contrat }} </p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° Clinet :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Consummation
                                        :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                            </div>

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année :</b></p>
                                <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Contrat
                                        de gaz :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->nom_contrat }}</p>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="shadow  ">
                    <div class="card-body">


                        <div class="  bg-success rounded-md p-4 flex justify-between ">
                            <h3 class="text-white">Compteur de Gaz Asoccié</h3>
                            <a href="{{ route('gazMeter.show', $FactureGaz->Gazcontract->gazMeter->id) }}"
                                class="bg-slate-50 p-2 rounded-full text-white"><i
                                    class=" text-emerald-400 fa fa-eye"></i></a>
                        </div>



                        <div
                            class=" grid  my-2 gap-3 grid-cols-1 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-2   text-center ">

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                        :</b> </p>
                                <p> {{ $FactureGaz->Gazcontract->gazMeter->nom_site }} </p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° PCE :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->gazMeter->PCE }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Profile
                                        :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->gazMeter->profil }}</p>
                            </div>

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année :</b></p>
                                <p> {{ $FactureGaz->Gazcontract->gazMeter->tarif }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Conso. Menstuelle :</b>
                                </p>
                                <p> {{ $FactureGaz->Gazcontract->gazMeter->consommation_mentsauelle }}</p>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <a href="{{ route('billGazs') }}" class="btn btn-success my-2 mw-3"> <i
                    class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
@endsection

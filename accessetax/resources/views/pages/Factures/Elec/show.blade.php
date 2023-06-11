@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="  bg-success rounded-md p-4 flex justify-between ">
                        <h3 class="text-white">Détail de la facture</h3>
                    </div>




                    <div class=" grid  my-2 gap-2 grid-cols-1 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2   text-center ">

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                </b> </p>
                            <p> {{ $FactureElec->numero_compteur }} </p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° Clinet </b>
                            </p>
                            <p> {{ $FactureElec->numero_client }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Fournisseur
                                </b>
                            </p>
                            <p> {{ $FactureElec->fournisseur }}</p>
                        </div>

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année </b></p>
                            <p> {{ $FactureElec->annee }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Consommation </b></p>
                            <p> {{ $FactureElec->consommation }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date début</b>
                            </p>
                            <p> Debut: {{ $FactureElec->date_debut }}</p>

                            </p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date fin </b>
                            </p>

                            <p> Fin :{{ $FactureElec->date_fin }}
                            </p>
                        </div>

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

            <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1  ">
                <div class="shadow  ">
                    <div class="card-body">


                        <div class="  bg-success rounded-md p-4 flex justify-between ">
                            <h3 class="text-white">Contrat d'éléctrcité Asoccié</h3>
                            <a href="{{ route('contractElec.show', $FactureElec->elecContract->id) }}"
                                class="bg-slate-50 p-2 rounded-full text-white"><i
                                    class=" text-emerald-400 fa fa-eye"></i></a>
                        </div>



                        <div
                            class=" grid  my-2 gap-3 grid-cols-1 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-2   text-center ">

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                    </b> </p>
                                <p> {{ $FactureElec->elecContract->nom_contrat }} </p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° fournisseur </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->fournisseur }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Consummation
                                    </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->nom_contrat }}</p>
                            </div>

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année </b></p>
                                <p> {{ $FactureElec->elecContract->nom_contrat }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date de signature </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->date_signature }}</p>
                            </div>

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date début</b>
                                </p>
                                <p> {{ $FactureElec->elecContract->date_debut }}</p>

                                </p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date fin </b>
                                </p>

                                <p> {{ $FactureElec->elecContract->date_fin }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="shadow  ">
                    <div class="card-body">


                        <div class="  bg-success rounded-md p-4 flex justify-between ">
                            <h3 class="text-white">Compteur d'éléctrcité Asoccié</h3>
                            <a href="{{ route('elecMeter.show', $FactureElec->elecContract->elecMeter->id) }}"
                                class="bg-slate-50 p-2 rounded-full text-white"><i
                                    class=" text-emerald-400 fa fa-eye"></i></a>
                        </div>



                        <div
                            class=" grid  my-2 gap-3 grid-cols-1 lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-2   text-center ">

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                    </b> </p>
                                <p> {{ $FactureElec->elecContract->elecMeter->nom_compteur }} </p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° PCE </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->elecMeter->PDL }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Puissance
                                    </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->elecMeter->puissance }}</p>
                            </div>

                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Profil </b></p>
                                <p> {{ $FactureElec->elecContract->elecMeter->profile }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Conso. Menstuelle </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->elecMeter->consommation }}</p>
                            </div>
                            <div class="flex flex-col card ">
                                <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année </b>
                                </p>
                                <p> {{ $FactureElec->elecContract->elecMeter->annee }}</p>
                            </div>



                        </div>

                    </div>
                </div>

            </div>
            <a href="{{ route('billsElecs') }}" class="btn btn-success my-2 mw-3"> <i
                    class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
@endsection

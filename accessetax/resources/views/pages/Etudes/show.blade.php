@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class=" shadow-md bg-slate-700 rounded-md p-4   text-success">Détail de l'etude</h3>

                    <div class=" grid gap-3 grid-cols-2 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2   text-center ">
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                            {{ $etude->numero_compteur }}
                        </p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                            {{ $etude->numero_client }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                            {{ $etude->consommation }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                            {{ $etude->annee }}</p>
                        <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                :</b>
                            {{ $etude->Elec_contract_id }}</p>

                    </div>


                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1  ">
                <div class="shadow my-2">
                    <div class="card-body">
                        <h4 class=" shadow-md bg-slate-700 rounded-md p-4   text-success">Site Asoccié</h4>

                        <div
                            class=" grid  my-2 gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2   text-center ">
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                                {{ __(' ') }}
                            </p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                    :</b>
                                {{ __(' ') }}</p>
                        </div>

                    </div>

                </div>
                <div class="shadow  ">
                    <div class="card-body">
                        <h4 class=" shadow-md bg-slate-700 rounded-md p-4 text-success   ">liste des compteurs Asoccié</h4>

                        <div
                            class=" grid  my-2 gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2   text-center ">
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Nom de compteur :</b>
                                {{ __(' ') }}

                            </p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ N° Clinet :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Consummation :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Année :</b>
                                {{ __(' ') }}</p>
                            <p class="shadow-md bg-gray-50 rounded-md p-2 "> <b class="text-success">+ Contrat de gaz
                                    :</b>
                                {{ __(' ') }}</p>
                        </div>

                    </div>
                </div>

            </div>
            <a href="{{ route('studies') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
@endsection

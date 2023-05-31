@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class=" card p-4 text-success">Détail de la facture</h3>

                    <div class="container-fluid p-2   d-flex justify-content-between flex-wrap">
                        <p class="card p-2  w-50"> <b class="text-success">+ Nom de compteur :</b>
                            {{ $FactureGaz->numero_compteur }}
                        </p>
                        <p class="card p-2  w-40"> <b class="text-success">+ N° Clinet :</b>
                            {{ $FactureGaz->numero_client }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Consummation :</b>
                            {{ $FactureGaz->consommation }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Année :</b> {{ $FactureGaz->annee }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Contrat d'Gaztrcité :</b>
                            {{ $FactureGaz->gaz_contract_id }}</p>
                    </div>
                    <object data="{{ $FactureGaz->fichier }}" type="application/pdf" width="100%" height="500px">
                        <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                                href="{{ $FactureGaz->fichier }}">Télécharger</a>
                            pour visualuser.</p>
                    </object>

                    <a href="{{ route('billGazs') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

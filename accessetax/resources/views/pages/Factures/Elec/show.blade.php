@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class=" card p-4 text-success">Détail de la facture</h3>

                    <div class="container-fluid p-2   d-flex justify-content-between flex-wrap">
                        <p class="card p-2  w-50"> <b class="text-success">+ Nom de compteur :</b>
                            {{ $FactureElec->numero_compteur }}
                        </p>
                        <p class="card p-2  w-40"> <b class="text-success">+ N° Clinet :</b>
                            {{ $FactureElec->numero_client }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Consummation :</b>
                            {{ $FactureElec->consommation }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Année :</b> {{ $FactureElec->annee }}</p>
                        <p class="card p-2  w-40"> <b class="text-success">+ Contrat d'electrcité :</b>
                            {{ $FactureElec->elec_contract_id }}</p>
                    </div>
                    <object data="{{ $FactureElec->fichier }}" type="application/pdf" width="100%" height="500px">
                        <p>Unable to display PDF file. <a href="{{ $FactureElec->fichier }}">télécharger</a>
                            instead.</p>
                    </object>

                    <a href="{{ route('billsElecs') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

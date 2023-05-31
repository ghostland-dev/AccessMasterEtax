@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body d-flex justify-content-around flex-wrap">
                    <div class="col-md-6">
                        <h5 class="card-title text-success">Détail de code d'activité</h5>
                        <p class="card-text"> <b class="text-dark">+ compteur C4 :</b> {{ $Piremetrecompteur->compteur_c4 }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ compteur C5 :</b> {{ $Piremetrecompteur->compteur_c5 }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ compteur HTA :</b>
                            {{ $Piremetrecompteur->compteur_hta }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ compteur T2 :</b> {{ $Piremetrecompteur->compteur_t2 }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ compteur T3 :</b> {{ $Piremetrecompteur->compteur_t3 }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ compteur T4 :</b> {{ $Piremetrecompteur->compteur_t4 }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title text-success">Entreprise </h5>

                        <p class="card-text"> <b class="text-dark">+ SIREN :</b>
                            {{ $Piremetrecompteur->company->siren }}
                        </p>
                        <p class="card-text"> <b class="text-dark">+ Nom d'entreprise :</b>
                            {{ $Piremetrecompteur->company->denomenation }}</p>


                    </div>


                </div>
                <a href="{{ route('premMeters') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.signed')
@section('main')
    <div class="card">

        <div class="card-body d-flex justify-content-around my-4 flex-wrap">
            <div class="col-md-6">
                <h5 class="card-title text-success">Détail de code d'activité</h5>
                <p class="card-text"> <b class="text-dark">+ Titre :</b> {{ $TauxReduit->titre }}
                </p>
                <p class="card-text"> <b class="text-dark">+ consommation_mkw :</b>
                    {{ $TauxReduit->consommation_mkw }}
                </p>
                <p class="card-text"> <b class="text-dark">+ Remuneration :</b> {{ $TauxReduit->remuneration }}
                </p>

            </div>


        </div>
        <a href="{{ route('taxReds') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
    </div>
@endsection
